<?php
class Item_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor.
        parent::__construct();
    }
	
	function add_item() {
		$item_info = array(
			'name' => $this->input->post('item_name'),
			'description' => $this->input->post('item_description'),
			'cost' => $this->input->post('item_cost'),
			'veg' => $this->input->post('dish_class'),
			'cookingTime' => $this->input->post('item_cooktime'),
			'calorieCount' => $this->input->post('item_calcount'),
			'categoryId' => $this->input->post('item_category'),
		);
		$query  = $this->db->insert('itemdetails',$item_info);
		return $query;
	}
}