<?php

class Api_category extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	
	function index() {
		
	}
	
	function getcategory() {
		$this->load->model('category_model');
		$q_data['data'] = $this->category_model->get_category();
		$this->output->set_content_type('text/xml');
		$this->load->view('api/get_category', $q_data);
	}
} 