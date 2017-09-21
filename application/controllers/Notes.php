<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notes extends SC_Controller {

	function __construct() {

		parent::__construct();
		$this->load->model('notes_model');

	}

	 public function index () {

		 $this->view();

	 }

	public function view($note = NULL)
	{

		$this->load->helper('form');

		if ($note != NULL) {
			$note = $this->notes_model->get_note ($this->session->userdata('user_id'), $note);
		}

		$data = array (
			'user_notes' => $this->notes_model->get_user_notes($this->session->userdata('user_id')),
			'form'		=> array (
				'hidden'	=> array (
					'note_id'		=> ($note != NULL) ? $note['note_id'] : ''
				),
				'title'		=> array (
					'type'			=> 'text',
					'name'			=> 'input-title',
					'placeholder'	=> 'Title Here',
					'value' 		=> ($note != NULL) ? $note['note_title'] : '',
					'id'			=>'note_title',
					'required'		=> TRUE
				),
				'content'			=> array (
					'rows' 			=> '10',
					'cols' 			=> '50',
					'name' 			=> 'input-content',
					'class'			=> 'textarea',
					'placeholder' 	=> 'Type Here',
					'value' 		=> ($note != NULL) ? $note['note_content'] : '',
					'id'			=> 'note_text',
					'required'		=> TRUE
				)
			)
		);

		$this->build ('notepad/notes', $data);
	}


	public function do_add_note () {

		# load the form validator
		$this->load->library ('form_validation');

		# set the form rules
		$rules = array (
			array (
				'field'	=> 'input-title',
				'label' => 'Title',
				'rules' => 'required'
			),
			array (
				'field'	=> 'input-content',
				'label' => 'content',
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

		$title 		= $this->input->post ('input-title');
		$content 	= $this->input->post ('input-content');
		$note_id 	= $this->input->post ('note_id');

	if ($note_id == '') {
		if (!$this->notes_model->add_note ($title, $content)) {
			echo "The note was not registered.";
		} else {
			redirect('Notes');
		}

	} else {
		if (!$this->notes_model->update_note ($note_id, $title, $content)){
			echo "The note was not registered.";
			} else {
			redirect('Notes');
			}
	}

	}

	public function note($id = null){
		# load the form validator
		$this->load->library ('form_validation');

		if($id != null){
			$result =$this->note_model->get([
				'note_id'  => $id,
				'user_id' => $this->session->userdata('user_id')
			]);
		} else {
			$result = $this->note_model->get([
				'note_id' => $this->session->userdata('user_id')
			]);
		}
		$this->output->set_output(json_encode($result));
		}


}
