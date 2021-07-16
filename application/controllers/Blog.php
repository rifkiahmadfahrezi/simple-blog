<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {


	public static function show_date($date = null){
		$months = ['Jan', 'Feb', 'Mar', 'apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

		$date = explode('-', $date);


		$month = $months[$date[1] * 1 - 1];


		return "{$date[2]} {$month} {$date[0]}";
	}

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Blog_model');
	}


	public function index()
	{	
		// if user not logged in
		if ($this->session->login == FALSE) {
			// redirect to login page
			redirect('auth/login','refresh');
		}

		redirect('home');
	}

	public function new()
	{	
		// if user not logged in
		if ($this->session->login == FALSE) {
			// redirect to login page
			redirect('auth/login','refresh');
		}

		$data = [
			'title' => 'Create new blog - Blog App',
			'active_page' => 'new blog'
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('blog/new');
		$this->load->view('templates/footer', $data);
	}

	public function action(string $action_type = '')
	{

		// if user not logged in
		if ($this->session->login == FALSE) {
			// redirect to login page
			redirect('auth/login','refresh');
		}

		// if user level not admin
		if ($this->session->level != 'admin') {
			redirect('home','refresh');
		}


		switch($action_type) {
			case 'create-blog':

				$title = htmlspecialchars($this->input->post('title'));
				$content = $this->input->post('content');

				if (empty($title) || empty($content)) {
					redirect('blog/new');
				}

				$uploaded_at = date('Y-m-d');
				$last_update = date('Y-m-d');


				$data = [
					'title' => $title,
					'content' => $content,
					'uploaded_at' => $uploaded_at,
					'last_update' => $last_update
				];

				$this->Blog_model->insert($data, 'blogs');

				$this->session->set_flashdata('form-status','success');

				redirect('home');

			break;
			case 'edit-blog': 
				$title = htmlspecialchars($this->input->post('title'));
				$content = $this->input->post('content');
				$id = htmlspecialchars($this->input->post('id_blog'));
				$last_update = date('Y-m-d');


				$data = [
					'title' => $title,
					'content' => $content,
					'last_update' => $last_update
				];

				$this->Blog_model->edit_blog($data, $id);

				// var_dump(mysqli_error());

				redirect('home');
			break;

			default:
				redirect('home');
			break;
		}

	}
	public function view($id) // for viewing blog's content
	{	
		// if user not logged in
		if ($this->session->login == FALSE) {
			// redirect to login page
			redirect('auth/login','refresh');
		}

		if (empty($id)) {
			redirect('home');
		}else{

			$data = [
				'blogs' => $this->Blog_model->show_all($id),
				'title' =>  $this->Blog_model->show_all($id)[0]['title']
			];

			$this->load->view('templates/header', $data, FALSE);
			$this->load->view('blog/view', $data);
			$this->load->view('templates/footer');
			
		}
	}

	public function delete($id = null) // for delete selected blog
	{	
		// if user level not admin
		if ($this->session->level != 'admin') {
			redirect('home','refresh');
		}

		$this->Blog_model->delete($id);
	}

	public function edit($id = null) // for edit blog
	{
		// if user not logged in
		if ($this->session->login == FALSE) {
			// redirect to login page
			redirect('auth/login','refresh');
		}

		// if user level not admin
		if ($this->session->level != 'admin') {
			redirect('home','refresh');
		}
		
		$data = [
			'title' => 'Edit blog - Blog App',
			'blog_content' => $this->Blog_model->show_all($id),
			'active_page' => 'Edit blog'
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('blog/edit', $data);
		$this->load->view('templates/footer');
	}

}

/* End of file Blog.php */
/* Location: ./application/controllers/Blog.php */