<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timetable extends SC_Controller {

	public function index()
	{
		$this->build('Timetable/Timetable');
	}
}
