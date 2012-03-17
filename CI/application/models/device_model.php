<?php

class Device_model extends CI_Model {
	function __construct() {
        // Call the Model constructor.
        parent::__construct();
    }
	
	function get_unique_device() {
		$device_info = array(
			'deviceIdentifier' => $this->input->post('deviceId')
		);
		
		$this->db->where($device_info);
		// Firing the query
		$query = $this->db->get('device');
		if($query->num_rows == 1) {
			return true;
		}
	}
	
	function get_unique_table() {
		$device_info = array(
			'tablenumber' => $this->input->post('tableNo')
		);
		
		$this->db->where($device_info);
		// Firing the query
		$query = $this->db->get('device');
		if($query->num_rows == 1) {
			return true;
		}
	}
	
	function add_device() {
		$device_info = array(
			'deviceIdentifier' => $this->input->post('deviceId'),
			'tablenumber' => $this->input->post('tableNo')
		);
		$this->db->insert('device', $device_info); 
	}
}