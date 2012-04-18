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
	
	function getitem_for_category() {
		$this->load->model('item_model');
		$q_data['data'] = $this->item_model->get_item_for_category($this->input->post('categoryId'));
		$this->output->set_content_type('text/xml');
		$this->load->view('api/get_item', $q_data);
	}
	
	function getitem_image() {
		$this->load->model('image_model');
		$q_data['data'] = $this->image_model->get_image($this->input->post('itemId'));
		$this->output->set_content_type('text/xml');
		$this->load->view('api/get_item_image', $q_data);
	}
	
	function like() {
		$this->load->model('item_model');
		$this->item_model->like();
		
		$this->output->set_content_type('text/xml');
		echo '<item failure="0" errorMessage="Rated successfully"></item>';
	}
	
	function dislike() {
		$this->load->model('item_model');
		$this->item_model->dislike();
		
		$this->output->set_content_type('text/xml');
		echo '<item failure="0" errorMessage="Rated successfully"></item>';
	}
}