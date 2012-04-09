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
	
	function get_item() {
		$this->db->select('itemId, name, cost, veg, likes, dislikes');
		$query = $this->db->get('itemdetails');
		return $query->result();
	}
	
	function get_item_for_category($catId) {
		$this->db->select('itemId, name, description, cost, veg, likes, dislikes');
		$query_info = array('categoryId' => $catId);
		$this->db->where($query_info);
		$query = $this->db->get('itemdetails');
		return $query->result();
	}
	
	function add_item_image($icon, $image) {
		$this->db->select('itemId');
		$this->db->where(array('name' => $this->input->post('item_name'),'description' => $this->input->post('item_description')));
		$query = $this->db->get('itemdetails');
		
		$itemId = $query->row(0)->itemId;
		
		$icon_info = array(
			'link' => $icon,
			'itemId' => $itemId,
			'type' => 'icon'
		);
		$image_info = array(
			'link' => $image,
			'itemId' => $itemId,
			'type' => 'image'
		);
		
		$this->db->insert('images',$icon_info);
		$this->db->insert('images',$image_info);
	}
}