<?php

class Order extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->is_logged_in();
	}
	
	function is_logged_in() {
	// Check if session is live
		$is_logged_in = $this->session->userdata('is_logged_in');
		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('start/logout');
		}
	}
	
	function show_orderinfo() {
		$this->load->model('order_model');
		$q_data = $this->order_model->generate_orderinfo();
		
		$data['order_listing'] = $q_data;
	
		$data['nav_bar'] = 'template/nav_bar';
		$data['main_content'] = 'screens/show_order_screen';
		$this->load->view('template/template.php', $data);
	}	
	
	function viewdetails() {
		$this->load->model('order_model');
		$q_data = $this->order_model->generate_orderdetails();
		
		$data['order_listing'] = $q_data;
	
		$data['nav_bar'] = 'template/nav_bar';
		$data['main_content'] = 'screens/show_order_info';
		$this->load->view('template/template.php', $data);
	}
}