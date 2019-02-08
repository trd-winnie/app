<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	
	public function login_form()
	{
		$this->_redirect_if_authenticated();
	}

	public function login_submit()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->login_form();
		}else {
			$this->_validate_user();
		}
	}

	public function logout()
	{
		$this->session->unset_userdata([
			'email', 'role', 'logged_in'
		]);

		$this->login_form();
	}

	private function _validate_user()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$logged = $this->user_model->find($email, $password);
		
		if ($logged) {
			$this->session->set_userdata([
				'email' => $logged->email,
				'role' => $logged->role_id,
				'logged_in' => true,
			]);
		}else {
			flash('danger', 'Invalid email or password.');
		}

		$this->_redirect_if_authenticated();
	}

	private function _redirect_if_authenticated()
	{
		$page = '';
		if ($this->session->logged_in) {
			if ($this->session->role == 1) {
				$page = 'admin/home';
			}else {
				$page = 'user/home';
			}
		}else {
			$page = 'auth/login_form';
		}
		
		$this->load->view('layout', compact('page'));
	}

}
