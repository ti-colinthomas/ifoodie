<?php
class Dashboard extends CI_Controller {
	function index() {
		$data['nav_bar'] = 'template/nav_bar';
		$data['main_content'] = 'dashboard_screen';
		$this->load->view('template/template.php', $data);
	}
	
	function login() {
		$this->load->model('user_model');
		$query = $this->user_model->validate_user();
		
		if ($query)	{ // If the user is validated.
			$session_data = array (
				'username' => $this->input->post('username'),
				'is_logged_in' => true
			);
			//	Create a session. Initialize it.
			$this->session->set_userdata($session_data);
			//	Display a view
			redirect('dashboard');
		}	else {
			redirect('start');
		}
	}
}
