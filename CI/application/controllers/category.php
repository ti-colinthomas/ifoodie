<?php
class Category extends CI_Controller {
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
	
	function add_category_screen() {
	// Draw the 'Add category' screen
		$data['nav_bar'] = 'template/nav_bar';
		$data['main_content'] = 'screens/category_add_screen';
		$this->load->view('template/template.php', $data);
	}
	
	function remove_category_screen() {
	// Fetch all categories
		$this->load->model('category_model');
		$q_data = $this->category_model->get_category();
		$data['category_listing'] = $q_data;
	// Draw the 'Remove category' screen
		$data['nav_bar'] = 'template/nav_bar';
		$data['main_content'] = 'screens/category_remove_screen';
		$this->load->view('template/template.php', $data);
	}
	
	function add_category() {
	// Action for the 'Add category' form
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error alert alert-error span4" style="margin-left: 0px;"><a class="close" data-dismiss="alert">�</a>', '</div>');
		
		$this->form_validation->set_rules('category_name','Name for new category','trim|required|callback_catname_check');
		$this->form_validation->set_rules('category_priority','Priority for new category', 'trim|required|integer');
		if ($this->form_validation->run() == FALSE) {
			$this->add_category_screen();
		} else {
			$this->load->model('category_model');
			$query = $this->category_model->add_category();
			if ($query) {
				$data['alert_status'] = 'enabled';
				$data['alert_message'] = '	<div class="row">
												<div class="alert alert-success">
													<a class="close" data-dismiss="alert">�</a>
													New category <strong>\''. $this->input->post('category_name') .'\'</strong> created successfully.
												</div>
											</div>';
				$data['nav_bar'] = 'template/nav_bar';
				$data['main_content'] = 'screens/category_add_screen';
				$this->load->view('template/template.php', $data);
			}
		}
	}
	
	function remove_category() {
		foreach($this->input->post() as $row) {
			$this->db->delete('category', array('categoryId' => $row));
			$this->load->model('category_model');
			$q_data = $this->category_model->get_category();
			$data['category_listing'] = $q_data;
			$data['alert_status'] = 'enabled';
			$data['alert_message'] = '	<div class="row">
											<div class="alert alert-success">
												<a class="close" data-dismiss="alert">�</a>
												The selected category(s) has been deleted successfully.
											</div>
										</div>';
			$data['nav_bar'] = 'template/nav_bar';
			$data['main_content'] = 'screens/category_remove_screen';
			$this->load->view('template/template.php', $data);
		}
	}
	
	function catname_check() {
	// Callback function for validating uniqueness for the categories being added
		$this->load->model('category_model');
		$valid = $this->category_model->check_cat_name();
		if($valid == FALSE) {
			$this->form_validation->set_message('catname_check', 'The %s field has to be unique');
			return FALSE;
		} else 
			return TRUE;
	}
	
}