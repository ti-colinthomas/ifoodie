<?php
class Table_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor.
        parent::__construct();
    }
	
	function add_table() {
	// Add new table to database.
		$table_info = array(
			'tableName' => $this->input->post('table_name'),
			'class' => $this->input->post('table_class'),
			'penalty' => $this->input->post('table_penalty')
		);
		$query = $this->db->insert('table',$table_info);
		return $query;
	}

	function get_table() {
		$this->db->select('tableId, tableName, deviceIdentifier, class, penalty');
		$query = $this->db->get('table');
		return $query->result();
	}
	
	function get_tablelist() {
		$query = $this->db->get('table');
		return $query->result();
	}
	
	function init_device() {
		$this->db->where('tableId',$this->input->post('tableId'));
		$device_info = array('deviceIdentifier' => $this->input->post('deviceId'));
		$this->db->update('table', $device_info);
		
		$table_info = array(
							'deviceIdentifier' => $this->input->post('deviceId')
							);
		$this->db->where($table_info);
		$query = $this->db->get('table');
		return $query->result();
	}
}