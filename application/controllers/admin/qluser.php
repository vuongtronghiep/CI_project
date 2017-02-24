<?php
	class Qluser extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('user_model');
			$this->load->helper('form');
			$this->load->helper('url');	
			$this->load->library("pagination");	
			
		}

		public function index(){
			//$data['user'] = $this->user_model->hienThiUser();
			//$this->load->view('admin/qluser',$data);

			$config['base_url']    = "admin/qluser/index";
			$config['total_rows']  = $this->user_model->countAll();
			$config['per_page']    = 7;	
			$config['prev_link']  = 'Lùi';
        	$config['next_link']  = 'Tiếp';
	
			$this->pagination->initialize($config);
			$limit = $config['per_page']    =7;
			$ofset = $this->uri->segment(4);	
			$data['user'] = $this->user_model->hienThiUser($limit,$ofset);

			$links = $this->pagination->create_links();
			$lks = $links;
			$lks = '<ul class="pagination">'.$links;
			$lks = str_replace('<a hr','<li><a hr', $lks);
			$lks = str_replace('</a>','</a></li>', $lks);
			$lks .= '</ul>';
			$data['links'] = $lks;	
			$this->load->view('admin/user', $data);	
		}

		public function xoathanhvien(){
			$taikhoan = $this->uri->segment('4');
			$this->user_model->xoaUser($taikhoan);
			redirect('admin/qluser');
		}

		public function timkiem(){
			$value = $this->input->get('txt_search');
			if( $this->input->get('subtimkiem')){
				if( $this->input->get('giatri') == "tenkhachhang"){
					$data['search'] = $this->user_model->timten($value);
					$this->load->view('admin/timkhachhang',$data);
				}elseif( $this->input->get('giatri') == "email"){
					$data['search'] = $this->user_model->timemail($value);
					$this->load->view('admin/timkhachhang',$data);
				}
				elseif( $this->input->get('giatri') == "diachi"){
					$data['search'] = $this->user_model->timdiachi($value);
					$this->load->view('admin/timkhachhang',$data);
				}
				elseif( $this->input->get('giatri') == "ngaytao"){
					$data['search'] = $this->user_model->timngaytao($value);
					$this->load->view('admin/timkhachhang',$data);
				}
			}
		}
	}

 ?>