<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Auth_model');
	}

	public function index()
	{

		// if user not logged in
		if ($this->session->login == FALSE) {
			// redirect to login page
			redirect('auth/login','refresh');
		}
		redirect('auth/login','refresh');
	}

	public function login()
	{	

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');

		$data = [
			'title' => "login - Blog's App"
		];

		if( $this->form_validation->run() == FALSE ){
			$this->load->view('templates/header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/footer');
		}else{
			$data = [
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),

			];
			$this->Auth_model->login($data);
		}


	}

	public function register()
	{	
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('conf_password', 'Password confirmation', 'trim|required|min_length[3]|matches[password]');

		$data = [
			'title' => "Register - Blog's App"
		];

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('auth/register');
			$this->load->view('templates/footer');
		}else{
			$data = [
				'id_user' => null,
				'username' => htmlspecialchars($this->input->post('username')),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'level' => 'user'
			];


			if ($this->Auth_model->register($data)) {
				$this->session->login = TRUE;
				redirect('home','refresh');
			}else{
				$this->session->message = "Register failed!!";
			}
		}

	}

	public function logout()
	{	
		$this->session->message = "logout success!!";
		session_destroy();
		redirect('auth/login','refresh');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */