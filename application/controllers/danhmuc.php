<?php
	class Danhmuc extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('chitietdanhmuc_model');
			$this->load->library("pagination");
		}

		public function hienthi(){
			$data['category'] = $this->chitietdanhmuc_model->hienthicategory();
			$kytu = $this->uri->segment('3');
			$data['sanphamnoibat'] = $this->chitietdanhmuc_model->sanphamnoibat();
			$data['chitiet1'] = $this->chitietdanhmuc_model->hienthisanpham1($kytu);
			$data['slider'] = $this->chitietdanhmuc_model->slider();
			

			$config['base_url']    = "danhmuc/hienthi";
			 $config['total_rows']  = $this->chitietdanhmuc_model->countAll($kytu);
			$config['per_page']    = 18;	
			$config['prev_link']  = 'Lại';
        	$config['next_link']  = 'Tiếp';
	
			$this->pagination->initialize($config);
			$limit = $config['per_page']   =18;
			$offset = $this->uri->segment(4);	
			$data['chitiet'] = $this->chitietdanhmuc_model->hienThisp($limit,$offset,$kytu);

			$links = $this->pagination->create_links();
			$lks = $links;
			$lks = '<ul class="pagination">'.$links;
			$lks = str_replace('<a hr','<li><a hr', $lks);
			$lks = str_replace('</a>','</a></li>', $lks);
			$lks .= '</ul>';
			$data['links'] = $lks;	
			$this->load->view('danhmuc', $data);
		}

	} 
 ?>