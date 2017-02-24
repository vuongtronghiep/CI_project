<?php
	class Qldanhmuc extends CI_Controller{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('danhmuc_model');
			$this->load->helper('form');
			$this->load->helper('url');	
			$this->load->library("pagination");	
		}

		public function index(){
			$config['base_url']    = "admin/qldanhmuc/index";
			$config['total_rows']  = $this->danhmuc_model->countAll();
			$config['per_page']    = 6;	
			$config['prev_link']  = 'Lại';
        	$config['next_link']  = 'Tiếp';
	
			$this->pagination->initialize($config);
			$limit = $config['per_page']    =6;
			 $offset = $this->uri->segment(4);
			$data['danhmucsp'] = $this->danhmuc_model->hienThiDanhMuc($limit,$offset);

			$links = $this->pagination->create_links();
			$lks = $links;
			$lks = '<ul class="pagination">'.$links;
			$lks = str_replace('<a hr','<li><a hr', $lks);
			$lks = str_replace('</a>','</a></li>', $lks);
			$lks .= '</ul>';
			$data['links'] = $lks;	
			$this->load->view('admin/danhmuc', $data);	
		}

		public function themdanhmuc(){
			$this->form_validation->set_rules('danhmuc', 'Tên danh mục', 'required');
			$this->form_validation->set_rules('kytu', 'Ký Tự ', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('admin/themdanhmuc');
			}else{	
				if($this->input->post('subdanhmuc')){
					$data = array(
						'tentheloai' => $this->input->post('danhmuc'),
						'tendanhmuc_kytu' => $this->input->post('kytu')
						);
					$this->danhmuc_model->themDanhMuc($data);
					redirect('admin/qldanhmuc');	
			}
				}
		}

		public function suadanhmuc(){
			$id = $this->uri->segment('4');
			$data['danhmuc'] = $this->danhmuc_model->hienthidm($id);
			$this->load->view('admin/suadanhmuc',$data,True);

			$this->form_validation->set_rules('danhmuc', 'Tên danh mục', 'required');
			$this->form_validation->set_rules('kytu', 'Ký Tự ', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('admin/suadanhmuc');
			}else{	
				if($this->input->post('subdanhmuc')){
					$data = array(
						'tentheloai' => $this->input->post('danhmuc'),
						'tendanhmuc_kytu' => $this->input->post('kytu')
						);
					$id = $this->uri->segment(4);
					$this->danhmuc_model->suaDanhMuc($id,$data);
					redirect('admin/qldanhmuc');	
				}
			}
		}

		public function xoadanhmuc($id){
			$id = $this->uri->segment('4');
			$this->danhmuc_model->xoadanhmuc($id);
			redirect('admin/qldanhmuc');
		}

		public function timkiem(){
			if($this->input->get('subtimkiem')){
				$danhmuc = $this->input->get('txt_search');
				$data['search'] = $this->danhmuc_model->timdanhmuc($danhmuc);
				$this->load->view('admin/timkiemdanhmuc',$data);
			}
		}
	}
?>