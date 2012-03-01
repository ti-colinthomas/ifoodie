<?php
class Data_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function add_category() {
		$category_info = array(
			'category_name' => $this->input->post('category_name');
			'category_priority' => $this->input->post('category_priority');
		);
	}
}