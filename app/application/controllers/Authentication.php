<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('middleware/User_Authentication', null, 'user_auth');
	}
	
	public function login_form()
	{
		$this->user_auth->redirect_if_authenticated();
	}

	public function login_submit()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->login_form();
		}else {
			$this->user_auth->validate_user();
		}
	}

	public function logout()
	{
		$this->session->unset_userdata([
			'email', 'role', 'logged_in'
		]);

		$this->login_form();
	}

}
