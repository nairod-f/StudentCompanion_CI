<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends SC_Controller {

	public function index()
	{
        

		$this->build('EditProfile/Editprofile',$data);
	}
}
