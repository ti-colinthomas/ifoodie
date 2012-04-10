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


	
	function add_to_order($orderId, $itemId, $instructions, $quantity, $cost) {
		$orderdetails_info = array(
								'orderId' => $orderId,
								'itemId' => $itemId,
								'instructions' => $instructions,
								'quantity' => $quantity,
								'cost' => $cost
							);
		$query = $this->db->insert($orderdetails_info);
		return $query;
	}
}