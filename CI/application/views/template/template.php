<?php
	$data['select_info'] = '';
	$this->load->view('template\header');
	if($nav_bar != NULL) {
		$this->load->view($nav_bar);
	}
	if(isset($alert_status)) {
		echo $alert_message;
	}
	if (isset($select_info)) {
		$data['select_info'] = $select_info;
	}
	if (isset($category_listing)) {
		$data['category_listing'] = $category_listing;
	}
	if(isset($item_listing)) {
		$data['item_listing'] = $item_listing;
	}
	$this->load->view($main_content,$data);
	$this->load->view('template\footer');
?>