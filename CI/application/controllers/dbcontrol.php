<?php
class dbcontrol extends CI_Controller {
	public function __construct() {
	
		parent::__construct();
        $this->is_logged_in();
	}
	
	function is_logged_in() {
		$is_logged_in = $this->session->userdata('is_logged_in');
		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('start/logout');
		}
	}
	
	function add_category() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('category_name','Name for new category','trim|required');
		$this->form_validation->set_rules('category_priority','Priority for new category', 'trim|required|integer');
		if ($this->form_validation->run() == FALSE) {
			redirect('dashboard/add_category');
		} else {
			print_r($this->input->post('category_name'));
			$this->load->model('data_model');
			$query = $this->data_model->add_category();
		}
	}
}