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
		print $query;
	}
}