<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editprofile extends SC_Controller {

	public function index()
	{
		$this->build('EditProfile/Editprofile');
	}
}
