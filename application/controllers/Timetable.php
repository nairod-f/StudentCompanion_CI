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
        $sessions = $this->timetable_model->get_sessions($id);

        $data = array (
            'sessions'  => $sessions,
            'formdata'  => array (
                'action'        => 'add_lecture',
                'attributes'    => array (
                    'id'            => 'lecture'
                )
            ),
            'form'		=> array (
                'lecture'		=> array (
                    'type'			=> 'text',
                    'name'			=> 'input-lecture',
                    'placeholder'	=> 'Eg. English',
                    'id'            => 'input-lecture',

                ),
                'location'			=> array (
                    'type'			=> 'text',
                    'name'			=> 'input-location',
                    'placeholder'	=> 'Eg. Resource room',
                    'id'            => 'input-location',
                    )
                )
            );

        $this->build('Timetable/Timetable', $data);

	}
    public function add($d,$t){

        $data = array (
            'form'		=> array (
                'hidden'        => array (
                    'day'       => $d,
                    'time'      => $t
                ),
                'lecture'		=> array (
                    'type'			=> 'text',
                    'name'			=> 'input-lecture',
                    'placeholder'	=> 'Eg. English',
                    'id'            => 'input-lecture',

                ),
                'location'			=> array (
                    'type'			=> 'text',
                    'name'			=> 'input-location',
                    'placeholder'	=> 'Eg. Resource room',
                    'id'            => 'input-location',
                    )
                )
            );

        $this->build('Timetable/Timetable_edit', $data);
    }

    public function edit($id){

        $data = array (
            'form'		=> array (
                'hidden'        => array (
                    'session_id'       => $id
                ),
                'lecture'		=> array (
                    'type'			=> 'text',
                    'name'			=> 'input-lecture',
                    'placeholder'	=> 'Eg. English',
                    'id'            => 'input-lecture',

                ),
                'location'			=> array (
                    'type'			=> 'text',
                    'name'			=> 'input-location',
                    'placeholder'	=> 'Eg. Resource room',
                    'id'            => 'input-location',
                    )
                )
            );

        $this->build('Timetable/Timetable_edit', $data);
    }
    public function edit_timeslot(){


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
        $session_id    = $this->input->post('session_id');
        $lecture 	= $this->input->post ('input-lecture');
        $location	= $this->input->post ('input-location');

if($session_id == NULL){
        $session_id= $this->timetable_model->add_data($time, $day, $lecture, $location);
        $this->timetable_model->link_session($this->session->userdata('user_id'), $session_id);

}else{
    $session_id= $this->timetable_model->update_timetable($session_id, $lecture, $location);

}
        if (!$session_id) {
            echo "This lecture could not be inputted.";
            return;
        }


        redirect('timetable');

        }

    }
