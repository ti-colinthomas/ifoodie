<?php
class Item extends CI_Controller {
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
	
	function add_item_screen() {
		// Fetching data from category model to display while
		// selecting category for new dish.
		$this->load->model('category_model');
		$q_data = $this->category_model->get_category();
		$data['select_info'] = array('a'=>'Select category');
		
		foreach($q_data as $row) {
			$key = $row->categoryId;
			$value = $row->categoryName;
			
			$data['select_info'] = array_merge($data['select_info'],array($key=>$value));
		}
		
		$data['nav_bar'] = 'template/nav_bar';
		$data['main_content'] = 'screens/item_add_screen';
		$this->load->view('template/template.php', $data);
	}
	
	function remove_item_screen() {
		$data['nav_bar'] = 'template/nav_bar';
		$data['main_content'] = 'screens/item_remove_screen';
		$this->load->view('template/template.php', $data);
	}
	
	function add_item() {
		
	}
}