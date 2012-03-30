<?php

class Api_device extends CI_Controller {

	function index() {
	
	}
	
	function device_init() {
		$this->output->set_content_type('text/xml');
		if(isset($_POST['deviceId']) && isset($_POST['tableName'])) {
			$this->load->model('device_model');
			$query = $this->device_model->get_unique_device();
			if(!($query)) {	// check if device is assigned to any table
				$query = $this->device_model->get_unique_table();
				if(!($query)) {	// check if table has been assigned to any device
					$this->device_model->add_device();
					echo '<?xml version="1.0" encoding="UTF-8"?>';
					echo '<initStatus failure="0" errorMessage="Device added successfully"></initStatus>';
				}
				echo '<?xml version="1.0" encoding="UTF-8"?>';
				echo '<initStatus failure="1" errorMessage="Table has been assigned to a device"></initStatus>';
			} else {
				echo '<?xml version="1.0" encoding="UTF-8"?>';
				echo '<initStatus failure="1" errorMessage="Device already assigned to a table"></initStatus>';
			}
		} else {
		echo '<?xml version="1.0" encoding="UTF-8"?>';
		echo '<initStatus failure="1" errorMessage="Invalid parameters"></initStatus>';
		}
	}
}