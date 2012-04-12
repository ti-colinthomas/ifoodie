<?php

class Device_model extends CI_Model {
	function __construct() {
        // Call the Model constructor.
        parent::__construct();
    }
	
	function add_device() {
		$device_info = array(
			'deviceIdentifier' => $this->input->post('deviceId')
		);
		$this->db->where('tableId', $this->input->post('tableId'));
		$this->db->update('table', $device_info); 
	}
}