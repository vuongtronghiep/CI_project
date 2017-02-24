<?php
	class Qladmin extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('admin_model');
		}

		public function index(){
			$data['admin'] = $this->admin_model->hienthiadmin();
			$this->load->view('admin/admin',$data);
		}

		public function xoaadmin(){

			$this->admin_model->xoaadmin($this->uri->segment('4'));
			redirect('admin/qladmin');
		}
	}
	
 ?>