<?php

class Api_settings extends CI_Controller {

	function index() {
	
	}
	
	function getOrderTimeout() {
		$this->load->model('settings_model');
		$q_data['data'] = $this->settings_model->getOrderTimeout();
		
		$this->output->set_content_type('text/xml');
		$this->load->view('api/get_timeout', $q_data);
	}
}