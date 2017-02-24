<?php
	class Qlgiaohang extends CI_Controller{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('sanpham_model');
			$this->load->helper('form');
			$this->load->helper('url');	
			$this->load->library('pagination');		
		}

		public function index(){
			$this->load->view('admin/giaohang');
		}

	}
?>