<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	
	public function login_form()
	{
		$page = 'auth/login_form';
		$this->load->view('layout', compact('page'));
	}
}
