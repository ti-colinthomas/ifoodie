<?php
class Category_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor.
        parent::__construct();
    }
	
	function add_category() {
	// Add new category to database.
		$category_info = array(
			'categoryName' => $this->input->post('category_name'),
			'priority' => $this->input->post('category_priority')
		);
		$query = $this->db->insert('category',$category_info);
		return $query;
	}
	
	function check_cat_name() {
	// Model function for validation callback for validating uniqueness.
	// Returns FALSE if category name already exists.
		$category_info = array(
			'categoryName' => $this->input->post('category_name')
		);
		
		$query = $this->db->get_where('category', $category_info, 1,0);
		if ($query->num_rows()>0)
			return FALSE;
		else
			return TRUE;
	}
	
	function get_category() {
		$this->db->select('categoryId, categoryName, priority');
		$query = $this->db->get('category');
		return $query->result();
	}
}