<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox extends SC_Controller {

	public function index()
	{
		$this->build('InboxMessages/Inbox');
	}
}
