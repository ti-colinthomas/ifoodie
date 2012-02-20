<?php

class Start extends CI_Controller {
	function index() {
		$data['nav_bar'] = NULL;
		$data['main_content'] = 'start_screen';
		$this->load->view('template\template', $data);
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
			redirect('start/login');
		}
	}

	function logout() {
		$this->session->sess_destroy();
		redirect('');
	}
}
