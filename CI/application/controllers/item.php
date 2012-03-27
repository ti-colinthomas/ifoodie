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
		$data['select_info'] = array('0'=>'Select category');
		foreach($q_data as $row) {
			$key = $row->categoryId;
			$value = $row->categoryName;
			$data['select_info'][$key] = $value;
		}		
		$data['nav_bar'] = 'template/nav_bar';
		$data['main_content'] = 'screens/item_add_screen';
		$this->load->view('template/template.php', $data);
	}
	
	function remove_item_screen() {
		$this->load->model('item_model');
		$q_data = $this->item_model->get_item();
		$data['item_listing'] = $q_data;
	
		$data['nav_bar'] = 'template/nav_bar';
		$data['main_content'] = 'screens/item_remove_screen';
		$this->load->view('template/template.php', $data);
	}
	
	function add_item() {
		// Action for the 'Add category' form
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error alert alert-error span4" style="margin-left: 0px;"><a class="close" data-dismiss="alert">×</a>', '</div>');
		
		$this->form_validation->set_rules('item_name','Name for new item','trim|required|callback_itemname_check');
		$this->form_validation->set_rules('item_description','description for new item','trim|required');
		$this->form_validation->set_rules('item_cost','Cost of item','trim|required');
		$this->form_validation->set_rules('item_cooktime','Cooking time for the dish','trim|required|integer');
		$this->form_validation->set_rules('item_calcount','Calorie count for the dish','trim|required|integer');
		$this->form_validation->set_message('numeric', '%s is not selected.');
		$this->form_validation->set_rules('item_category','Category of item','trim|required|numeric');
		
		if ($this->form_validation->run() == FALSE) {
			$this->add_item_screen();
		} else {
			$this->load->model('item_model');
			$query = $this->item_model->add_item();
			if ($query) {
				$data['alert_status'] = 'enabled';
				$data['alert_message'] = '	<div class="span11">
												<div class="alert alert-success">
													<a class="close" data-dismiss="alert">×</a>
													New dish item <strong>\''. $this->input->post('item_name') .'\'</strong> added successfully.
												</div>
											</div>';
				$data['nav_bar'] = 'template/nav_bar';
				$data['main_content'] = 'screens/item_add_screen';
				
				$this->load->model('category_model');
				$q_data = $this->category_model->get_category();
				$data['select_info'] = array('0'=>'Select category');
				foreach($q_data as $row) {
					$key = $row->categoryId;
					$value = $row->categoryName;
					$data['select_info'][$key] = $value;
				}

				$this->load->view('template/template.php', $data);
			}
		}
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		
		$image = "item_icon";
		$this->upload->do_upload($image);
		$icon = $this->upload->file_name;
		
		$image = "item_image";
		$this->upload->do_upload($image);
		$image = $this->upload->file_name;
		
		$this->load->model('item_model');
		$this->item_model->add_item_image($icon, $image);
	}
}