<?php

class Api_users extends CI_Controller {
	function index() {
	
	}
	
	function login() {
		$this->output->set_content_type('text/xml');
		if(isset($_POST['username']) && isset($_POST['password'])) {
			$this->load->model('user_model');
			$query = $this->user_model->validate_user();
			if ($query) {
				echo '<?xml version="1.0" encoding="UTF-8"?>';
				echo '<staffLogin failure="0" errorMessage=""></staffLogin>';
			} else {
				echo '<?xml version="1.0" encoding="UTF-8"?>';
				echo '<staffLogin failure="1" errorMessage="Invalid credentials"></staffLogin>';
			}
		} else {
		echo '<?xml version="1.0" encoding="UTF-8"?>';
		echo '<staffLogin failure="1" errorMessage="Invalid parameters"></staffLogin>';
		}
		
	}
}