<?php

class Api_item extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	
	function index() {
		
	}
	
	function getitem() {
		$this->load->model('item_model');
		$q_data['data'] = $this->item_model->get_item();
		$this->output->set_content_type('text/xml');
		$this->load->view('api/get_item', $q_data);
	}
	
	function getitem_icon() {
		$this->load->model('image_model');
		$q_data['data'] = $this->image_model->get_icon($this->input->post('itemId'));
		$this->output->set_content_type('text/xml');
		$this->load->view('api/get_item_icon', $q_data);
	}
	
	function getitem_image() {
		$this->load->model('image_model');
		$q_data['data'] = $this->image_model->get_image($this->input->post('itemId'));
		$this->output->set_content_type('text/xml');
		$this->load->view('api/get_item_image', $q_data);
	}
}