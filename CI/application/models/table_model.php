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
			'tableName' => $this->input->post('table_name')
		);
		$query = $this->db->insert('table',$table_info);
		return $query;
	}

	function get_table() {
		$this->db->select('tableId, tableName, deviceIdentifier');
		$query = $this->db->get('table');
		return $query->result();
	}
}