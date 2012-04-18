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
	
	function add_orderitem() {
		$this->load->model('order_model');
		$query = $this->order_model->add_orderitem();
		$this->output->set_content_type('text/xml');
		echo '<order failure="0" errorMessage="">';
			echo '<additem message="Item ordered successfully"></additem>';
		echo '</order>';
	}
	
	function get_orderitems() {
		$this->load->model('order_model');
		$query['data'] = $this->order_model->get_orderitems();
		
		$this->output->set_content_type('text/xml');
		$this->load->view('api/get_orderitems', $query);
	}
	
	function remove_orderitem() {
		$this->load->model('order_model');
		$this->order_model->remove_orderitem();
		$this->output->set_content_type('text/xml');
		echo '<order failure="0" errorMessage="">';
			echo '<removeitem message="Item removed successfully"></removeitem>';
		echo '</order>';
	}
	
	function pre_close() {
		$this->load->model('order_model');
		$q_data['data'] = $this->order_model->pre_close();		
		
		$this->output->set_content_type('text/xml');
		$this->load->view('api/pre_close', $q_data);
	}
	
	function close_order() {
		$this->load->model('order_model');
		$q_data['data'] = $this->order_model->close_order();		
		
		$this->output->set_content_type('text/xml');
		$this->load->view('api/close_order', $q_data);
	}
}