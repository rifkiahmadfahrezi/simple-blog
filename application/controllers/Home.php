<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	// public static $level = $this->session->level;

	public function index()
	{		
		// if user not logged in
		if ($this->session->login == FALSE) {
			$this->session->message = "You need to login first!!";
			// redirect to login page
			redirect('auth/login','refresh');
		}



		$this->load->model('Blog_model');
		$blogs = $this->Blog_model->get_all_blogs_title();

		$data = [
			'title' => 'Home - Blog App',
			'active_page' => 'home',
			'blogs' => $blogs,
			'level' => $this->session->level
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
	}


}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */