<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SC_Form_validation extends CI_Form_validation {

	public function __construct($rules = array())
	{
		parent::__construct($rules);
	}

	public function alpha_spaces($str)
	{
		return (bool) preg_match('/^[A-Z ]+$/i', $str);
	}

}
