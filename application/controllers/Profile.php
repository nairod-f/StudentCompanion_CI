<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends SC_Controller {

    function __construct () {

        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('users_model');

    }
	public function index()
	{
        $id = $this->session->userdata('user_id');
        $user = $this->users_model->get_userdata($id);

        //var_dump($user);

        $data = array (
            'formdata'  => array (
                'action'        => 'Profile/update_users',
                'attributes'    => array (
                    'id'            => 'profile'
                ),
            ),
			'form'		=> array (
				'full_name'		=> array (
					'type'			=> 'text',
                    //value = it is used to show the data on the form in this case $user['user_full_name'] is taking
                    //the logged user's credentials
                    'value'         => $user['user_full_name'],
					'name'			=> 'input-full-name',
					'placeholder'	=> 'John Borg',
                    'id'            => 'input-name',
					'required'		=> TRUE
				),
				'email'			=> array (
					'type'			=> 'email',
					'name'			=> 'input-email',
                    'value'         => $user['user_email'],
					'placeholder'	=> 'me@example.com',
                    'id'            => 'input-email',
					'required'		=> TRUE
				)

			)
		);

		$this->build('EditProfile/Editprofile', $data);
	}

    public function update_users()
	{
		$this->load->library ('form_validation');

		$id = $this->session->userdata('user_id');

		$full_name = $this->input->post ('input-full-name');
		if ($full_name == '') $full_name = NULL;

		$email = $this->input->post ('input-email');
		if ($email == '') $email = NULL;

		$this->users_model->update_users($id, $full_name, $email);

		redirect('profile');
	}
}
