<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Authentication {

	protected $ci;

	public function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->model('user_model');
	}

	public function validate_user()
	{
		$email = $this->ci->input->post('email');
		$password = $this->ci->input->post('password');

		$logged = $this->ci->user_model->find_user($email, $password);
		
		if ($logged) {
			$this->ci->session->set_userdata([
				'email' => $logged->email,
				'role' => $logged->role_id,
				'logged_in' => true,
			]);
		}else {
			flash('danger', 'Invalid email or password.');
		}

		$this->redirect_if_authenticated();
	}

	public function redirect_if_authenticated()
	{
		if ($this->ci->session->logged_in) {
			$page = '';
			if ($this->ci->session->role == 1) {
				$page = 'admin/home';
			}else {
				$page = 'user/home';
			}
			$this->ci->load->view($page);
		}else {
			$this->ci->load->view('auth/login_form');
		}
		
	}
}