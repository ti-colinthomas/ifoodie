<?php

class Api_order extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	
	function index() {
		$this->load->model('order_model');
		$this->order_model->init_order();
	}	
}