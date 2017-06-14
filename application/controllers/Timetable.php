<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timetable extends SC_Controller {

    function __construct () {

        parent::__construct();
        $this->load->helper('form');
        $this->load->model('timetable_model');

    }

	public function index()
	{
        $id = $this->session->userdata('user_id');
        $user = $this->timetable_model->get_timedata($id);

        //var_dump($user);

        $data = array (
            'formdata'  => array (
                'action'        => 'add_lecture',
                'attributes'    => array (
                    'id'            => 'lecture'
                )
            ),
            'form'		=> array (
                'lecture'		=> array (
                    'type'			=> 'text',
                    'value'         => $user['lecture_name'],
                    'name'			=> 'input-lecture',
                    'placeholder'	=> 'Eg. English',
                    'id'            => 'input-lecture',

                ),
                'location'			=> array (
                    'type'			=> 'text',
                    'value'         => $user['lecture_location'],
                    'name'			=> 'input-location',
                    'placeholder'	=> 'Eg. Resource room',
                    'id'            => 'input-location',
                    )
                )
            );

        $this->build('Timetable/Timetable', $data);

	}

    public function edit_timeslot(){

        var_dump($this->input->post());

        # load the form validator
        $this->load->library ('form_validation');

        # set the form rules
        $rules = array (
            array (
                'field'	=> 'input-lecture',
                'label' => 'Lecture Name',
                'rules' => 'required|alpha_spaces'
            ),
            array (
                'field'	=> 'input-location',
                'label' => 'location ',
                'rules' => 'required'
            )
        );

        # set the rules in the library
        $this->form_validation->set_rules ($rules);

        # check for validation errors on the page, if there are any, stop here
        if ($this->form_validation->run () === FALSE) {
            echo validation_errors ();
            return;
        }

        $day 	      = $this->input->post ('day');
        $time	      = $this->input->post ('time');
        $lecture 	= $this->input->post ('input-lecture');
        $location	= $this->input->post ('input-location');

        $session_id= $this->timetable_model->add_data ($time, $day, $lecture, $location);

        if (!$session_id) {
            echo "This lecture could not be inputted.";
            return;
        }

        redirect('timetable');

        }

    }
