<?php
class Dashboard extends CI_Controller {
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
	
	function index() {
		$data['nav_bar'] = 'template/nav_bar';
		$data['main_content'] = 'screens/dashboard_screen';
		$this->load->view('template/template.php', $data);
	}
	
	function orders() {
		$data['nav_bar'] = 'template/nav_bar';
		$data['main_content'] = 'screens/orders_screen';
		$this->load->view('template/template.php', $data);
	}
	
	function manage() {
		$data['nav_bar'] = 'template/nav_bar';
		$data['main_content'] = 'screens/manage_screen';
		$this->load->view('template/template.php', $data);
	}
	
	function settings() {
		$data['nav_bar'] = 'template/nav_bar';
		$data['main_content'] = 'screens/settings_screen';
		$this->load->view('template/template.php', $data);
	}
}
