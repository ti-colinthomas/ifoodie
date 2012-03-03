<?php
class Category extends CI_Controller {
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
	
	function add_category_screen() {
		$data['nav_bar'] = 'template/nav_bar';
		$data['main_content'] = 'screens/category_add_screen';
		$this->load->view('template/template.php', $data);
	}
	
	function remove_category_screen() {
		$data['nav_bar'] = 'template/nav_bar';
		$data['main_content'] = 'screens/category_remove_screen';
		$this->load->view('template/template.php', $data);
	}
	
	function add_category() {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error help-inline">', '</div>');
		
		$this->form_validation->set_rules('category_name','Name for new category','callback_catname_check|trim|required');
		$this->form_validation->set_rules('category_priority','Priority for new category', 'trim|required|integer');
		if ($this->form_validation->run() == FALSE) {
			$this->add_category_screen();
		} else {
			$this->load->model('category_model');
			$query = $this->category_model->add_category();
		}
	}
	
	function catname_check($catname) {
		$this->load->model('category_model');
		$this->category_model->check_cat_name();
	}
}