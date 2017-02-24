<?php
	class Timkiem extends CI_Controller{	
		public function __construct(){
			parent::__construct();
			$this->load->model('trangchu_model');
			$this->load->helper('form');
			$this->load->helper('url');	
			$this->load->helper('date');
			
		}	

	public function search(){
		$data['category'] = $this->trangchu_model->hienthicategory();
			$offset = $this->trangchu_model->tongsanpham();			 
			$data['sanphammoi'] = $this->trangchu_model->sanphammoinhat($offset);
			$offset2 = 9;
			$data['sanphamcu'] = $this->trangchu_model->sanphamcu($offset2);
			$data['sanphamnoibat'] = $this->trangchu_model->sanphamnoibat();
			$data['slider'] = $this->trangchu_model->slider();
			$search = $this->input->get('txt_search');
			$data['search'] = $this->trangchu_model->search($search);		
			$this->load->view('timkiem',$data);			

		}
	}
?>