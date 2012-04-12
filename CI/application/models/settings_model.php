<?php
class Settings_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor.
        parent::__construct();
    }

	function getOrderTimeout() {
		$masters_info = array(
							'masterKey' => 'timeout'
							);
		$this->db->where($masters_info);
		$query = $this->db->get('masters');
		return $query->result();
	}
}