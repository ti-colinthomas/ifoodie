<?php

class Api_device extends CI_Controller {

	function index() {
	
	}
	
	function device_init() {
		$this->output->set_content_type('text/xml');
		$this->load->model('device_model');
		$this->device_model->add_device();
			echo '<?xml version="1.0" encoding="UTF-8"?>';
			echo '<initStatus failure="0" errorMessage="Device added successfully"></initStatus>';
	}
}