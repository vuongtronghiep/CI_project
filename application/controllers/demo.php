<?php
		class Demo extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('demo_model');
			$this->load->helper('url');
			$this->load->library('pagination');

		}
		public function in(){
			$data['test'] = $this->demo_model->indemo();
			$this->load->view('in',$data);
		}
	}
 ?>