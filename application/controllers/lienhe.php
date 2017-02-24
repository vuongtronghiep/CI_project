<?php
	class Lienhe extends CI_Controller{
		public function __construct(){
			parent::__construct();
		}
		public function index(){
			$this->load->view('lienhe/lienhe');
		}
		public function huongdanmuahang(){
			$this->load->view('lienhe/huongdanmuahang');
		}
		public function banggiavanchuyen(){
			$this->load->view('lienhe/banggiavanchuyen');
		}



	}
 ?>