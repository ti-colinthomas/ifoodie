<?php

class Start extends CI_Controller {
	function index() {
		$data['nav_bar'] = NULL;
		$data['main_content'] = 'start_screen';
		$this->load->view('template\template', $data);
	}
}
