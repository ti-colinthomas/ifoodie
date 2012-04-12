<?php

class Api_table extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}

	function get_tablelist() {
		$this->load->model('table_model');
		$q_data['data'] = $this->table_model->get_tablelist();
		
		$this->output->set_content_type('text/xml');
		$this->load->view('api/get_tablelist', $q_data);
	}
	
	function init_device() {
		$this->load->model('table_model');
		$this->table_model->init_device();
		
		$this->output->set_content_type('text/xml');
		echo '<masters failure="0" errorMessage="">';
			echo '<adddevice message="Device initialized"></adddevice>';
		echo '</masters>';
	}
}