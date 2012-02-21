<?php

class User_model extends CI_Model {
	
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	function validate_user() {
		// Constructing the query
		$login_credentials = array(
			'uname' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		$this->db->where($login_credentials);
		// Firing the query
		$query = $this->db->get('users');
		// If query has 1 result
		// User exists & is validated.
		if($query->num_rows == 1) {
			return true;
		}
	}
}