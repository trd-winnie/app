<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	protected $table = 'users';

	public function find(string $email, string $password)
	{
		if (empty($email) || empty($password)) {
			return;
		}

		$password = md5($password);

		$this->db->where('email', $email);
		$this->db->where('password', $password);

		return $this->db->get($this->table)->row();
	}

	public function is_admin(int $id)
	{
		if (empty($id)) {
			return;
		}

		$this->db->where('id', $id);
		$query = $this->db->get($this->table)->row();

		if (!empty($query)) {
			if ($query->role_id == 1) {
				return true;
			}
			return false;
		}

	}

	public function is_user($id)
	{
		return !$this->is_admin($id);
	}

}