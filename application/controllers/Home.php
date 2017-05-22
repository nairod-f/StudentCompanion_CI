<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends SC_Controller {

	public function index()
	{
		$this->build('newsfeed/nf-home');
	}
}
