<?php

class Table extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->is_logged_in();
	}
	
	function is_logged_in() {
	// Check if session is live
		$is_logged_in = $this->session->userdata('is_logged_in');
		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('start/logout');
		}
	}
	
	function add_table_screen() {
		$data['nav_bar'] = 'template/nav_bar';
		$data['main_content'] = 'screens/table_add_screen';
		$this->load->view('template/template.php', $data);
	}
	
	function remove_table_screen() {

		$this->load->model('table_model');
		$q_data = $this->table_model->get_table();
		$data['table_listing'] = $q_data;

		$data['nav_bar'] = 'template/nav_bar';
		$data['main_content'] = 'screens/table_remove_screen';
		$this->load->view('template/template.php', $data);
	}
	
	function add_table() {
	// Action for the 'Add table' form
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error alert alert-error span4" style="margin-left: 0px;"><a class="close" data-dismiss="alert">×</a>', '</div>');
		
		$this->form_validation->set_rules('table_name','Name for new table','trim|required');
		$this->form_validation->set_rules('table_class','Name for new table','trim|required');
		$this->form_validation->set_rules('table_penalty','Name for new table','trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->add_table_screen();
		} else {
			$this->load->model('table_model');
			$query = $this->table_model->add_table();
			if ($query) {
				$data['alert_status'] = 'enabled';
				$data['alert_message'] = '	<div class="row">
												<div class="alert alert-success">
													<a class="close" data-dismiss="alert">×</a>
													New table <strong>\''. $this->input->post('table_name') .'\'</strong> added successfully.
												</div>
											</div>';
				$data['nav_bar'] = 'template/nav_bar';
				$data['main_content'] = 'screens/table_add_screen';
				$this->load->view('template/template.php', $data);
			} 
		}
	}
	
	function remove_table() {
		foreach($this->input->post() as $row) {
			$this->db->delete('table', array('tableId' => $row));
			$this->load->model('table_model');
			$q_data = $this->table_model->get_table();
			$data['table_listing'] = $q_data;
			$data['alert_status'] = 'enabled';
			$data['alert_message'] = '	<div class="row">
											<div class="alert alert-success">
												<a class="close" data-dismiss="alert">×</a>
												The selected table(s) has been deleted.
											</div>
										</div>';
			$data['nav_bar'] = 'template/nav_bar';
			$data['main_content'] = 'screens/table_remove_screen';
			$this->load->view('template/template.php', $data);
		}
	}
}