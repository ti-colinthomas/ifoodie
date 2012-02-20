<?php
	$this->load->view('template\header');
	if($nav_bar != NULL) {
		$this->load->view($nav_bar);
	}
	$this->load->view($main_content);
	$this->load->view('template\footer');
?>