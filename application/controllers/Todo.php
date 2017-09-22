<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todo extends SC_Controller {

	function __construct() {

		parent::__construct();
		$this->load->model('todo_model');
        $this->load->helper('URL');



	}

	 public function index () {
	 }

	public function view_todo($todo = NULL)
	{
		$this->load->helper('form');

		if ($todo != NULL) {
			$todo = $this->todo_model->get_todo_list($this->session->userdata('user_id'), $todo);
		}

		$data = array (
			'user_todo' => $this->todo_model->get_user_todo($this->session->userdata('user_id')),
			'form'		=> array (
				'hidden'	=> array (
					'todo_list_id'		=> ($todo != NULL) ? $todo['todo_list_id'] : ''
				),
				'title'		=> array (
					'type'			=> 'text',
					'name'			=> 'todo_title',
					'placeholder'	=> 'Title Here',
					'value' 		=> ($todo != NULL) ? $todo['todo_title'] : '',
					'id'			=>'todo_title',
					'required'		=> TRUE
				),
				'content'			=> array (
					'rows' 			=> '10',
					'cols' 			=> '10',
					'name' 			=> 'todo_content',
					'class'			=> 'textarea',
					'placeholder' 	=> 'Type Here',
					'value' 		=> ($todo != NULL) ? $note['todo_content'] : '',
					'id'			=> 'todo_content',
					'required'		=> TRUE
				)
			)
		);

		$this->build('Todo_list/Todo', $data);
	}


	public function do_add_note () {

		# load the form validator
		$this->load->library ('form_validation');

		# set the form rules
		$rules = array (
			array (
				'field'	=> 'todo_title',
				'label' => 'Title',
				'rules' => 'required'
			),
			array (
				'field'	=> 'todo_content',
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

		$todo_title 		= $this->input->post ('todo_title');
		$todo_content      	= $this->input->post ('todo_cont');
		$todo_id           	= $this->input->post ('todo_list_id');

	if ($todo_id == '') {
		if (!$this->todo_model->add_item ($todo_title, $todo_content)) {
			echo "The todo was not registered.";
		} else {
			redirect('Todo');
		}

	} else {
		if (!$this->todo_model->update_todo ($todo_id, $todo_title, $todo_content)){
			echo "The TO-DO was not registered.";
			} else {
			redirect('Todo');
			}
	}

	}

	public function todo($todo_id = null){
		# load the form validator
		$this->load->library ('form_validation');

		if($todo_id != null){
			$result =$this->todo_model->get([
				'todo_list_id'  => $todo_id,
				'user_id' => $this->session->userdata('user_id')
			]);
		} else {
			$result = $this->todo_model->get([
				'todo_list_id' => $this->session->userdata('user_id')
			]);
		}
		$this->output->set_output(json_encode($result));
		}

}
