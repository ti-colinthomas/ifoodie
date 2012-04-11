<?php
class Order_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor.
        parent::__construct();
    }
	
	function init_order($deviceId) {
		$order_info = array(
							'status' => 'open', 
							'deviceId' => $deviceId
							);
		$query = $this->db->insert('order', $order_info);
		
		$this->db->where($order_info);
		$query = $this->db->get('order');
		return $query->result();
	}
	
	function add_orderitem() {
		$order_item = array(
							'itemId' => $this->input->post('itemId'),
							'orderId' => $this->input->post('orderId'),
							'instructions' => $this->input->post('instructions'),
							'quantity' => $this->input->post('quantity'),
							'cost' => $this->input->post('cost')
							);
		$query = $this->db->insert('itemOrder', $order_item);
	}	
}