<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function register($data)
	{
		return $this->db->insert('users', $data);
	}

	public function login($data)
	{	
		// get username
		$username = $this->db->query("SELECT username FROM users WHERE username = '{$data['username']}'")->result_array();
			
		if (empty($username)) {
			$this->session->message = "Username not registered!";
			redirect('auth/login','refresh');
			return FALSE;
		}


		// get password from DB and verify
		$password = $this->db->query("SELECT password FROM users WHERE username = '{$data['username']}'")->result_array();

		if (password_verify($data['password'], $password[0]['password'])) {

			// get user level
			$level = $this->db->query("SELECT level FROM users WHERE username = '{$data['username']}'")->result_array();

		if ($level[0]['level'] == 'admin') {
			$this->session->level = 'admin';
		}else{
			$this->session->level = 'user';
		}

			$this->session->login = TRUE;
			redirect('home','refresh');
		}else{
			$this->session->message = "Password incorect!";
			redirect('auth/login','refresh');
			return FALSE;
		}

		



	}

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */