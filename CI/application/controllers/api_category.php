<?php

class Api_category extends CI_Controller {
      index() {

      }

      getCategory {
      		  $this->load->model('category_model');
		  q_data =  $this->category_model->get_category();
      }
}