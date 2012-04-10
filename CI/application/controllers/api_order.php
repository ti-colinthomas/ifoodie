<?php

class Api_order extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	
	function new_order() {
		$this->load->model('order_model');
		$q_data['data'] = $this->order_model->init_order($this->input->post('deviceId'));
		
		$this->output->set_content_type('text/xml');
		$this->load->view('api/get_orderinfo', $q_data);
	}

	function add_to_order() {
		$this->load->model('order_model');
		$query = $this->order_model->add_to_order(
										$this->input->post('deviceId'), 
										$this->input->post('itemId'), 
										$this->input->post('instructions'), 
										$this->input->post('quantity'), 
										$this->input->post('cost')
										);
		if ($query) {
			echo '<?xml version="1.0" encoding="UTF-8"?>';
			echo '<order failure="0" errorMessage="Item added successfully"></order>';
		}
	}
}