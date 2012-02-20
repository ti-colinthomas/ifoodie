<?php
class Dashboard extends CI_Controller {
	public function __construct() {
	
		parent::__construct();
        $this->is_logged_in();
	}

	function index() {
		$data['nav_bar'] = 'template/nav_bar';
		$data['main_content'] = 'dashboard_screen';
		$this->load->view('template/template.php', $data);
	}
	
	function is_logged_in() {
		$is_logged_in = $this->session->userdata('is_logged_in');
		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('start/logout');
		}
	}
}
