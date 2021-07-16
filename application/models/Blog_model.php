<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

	public function get_all_blogs_title()
	{	
		$this->db->order_by("id_blog", "DESC");
		return $this->db->get("blogs")->result_array();
	}

	public function insert(array $data = [], string $table_name)
	{
		return $this->db->insert($table_name, $data);
	}

	public function show_all($id)
	{
		return $this->db->get_where('blogs', ['id_blog' => $id])->result_array();
	}

	public function delete($id = null)
	{
		if (empty($id)) {
			die("Blog's ID not found");
		}

		if (!$this->db->delete('blogs', ['id_blog' => $id])) {
			die("Delete failed");
		}else{
			redirect('home','refresh');
		}

	}

	public function edit_blog($data = [], $id = null)
	{	
		$this->db->set($data);
		$this->db->where('id_blog',$id);
		return $this->db->update('blogs');
	}


}

/* End of file Blog_model.php */
/* Location: ./application/models/Blog_model.php */