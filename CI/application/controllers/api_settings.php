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
	
	function update() {
		$this->load->model('settings_model');
		$this->settings_model->update_settings();
		$this->settings();
	}
	
	function settings() {
		$this->load->model('settings_model');
		$q_data = $this->settings_model->getOrderTimeout();
		
		$data['select_info'] = $q_data;
	
		$data['nav_bar'] = 'template/nav_bar';
		$data['main_content'] = 'screens/settings_screen';
		$this->load->view('template/template.php', $data);
	}
}