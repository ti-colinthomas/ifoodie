<?php
class Image_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor.
        parent::__construct();
    }
	
	function get_image($item) {
		$query_info = array(
			'itemId' => $item,
		);
		$this->db->where($query_info);
		$query = $this->db->get('images');
		return $query->result();
	}
}