<?php
class Category_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function add_category() {
		$category_info = array(
			'categoryName' => $this->input->post('category_name'),
			'priority' => $this->input->post('category_priority')
		);
		
	}
	
	function check_cat_name() {
		$category_info = array(
			'categoryName' => $this->input->post('category_name')
		);
		
		$this->db->where($category_info);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return FALSE;
		else
			return TRUE;
	}
}