<?php
	class Qlnhanvien extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('nhanvien_model');
			$this->load->helper('form');
			$this->load->helper('url');	
			$this->load->library("pagination");	
		}

		public function index(){
			$data['nhanvien'] = $this->nhanvien_model->hienthi();
			$this->load->view('admin/nhanvien_giaohang',$data);
		}

		public function themnhanvien(){
			$this->form_validation->set_rules('tennhanvien', 'Tên nhân viên', 'required');
			$this->form_validation->set_rules('dt','Số điện thoại',  'required|min_length[10]|max_length[11]');
			$this->form_validation->set_rules('cmt', 'Chứng minh thư', 'required|min_length[9]|max_length[11]');
				$this->form_validation->set_rules('diachi', 'Địa chỉ', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('admin/themnhanvien');
			}else{
				if($this->input->post('them')){	
					$data = array(
						'tennhanvien' => $this->input->post('tennhanvien'),
						'ngaysinh' => $this->input->post('date'),
						'gioitinh' => $this->input->post('gt'),
						'sodienthoai' => $this->input->post('dt'),
						'diachi' => $this->input->post('diachi'),
						'chungminhthu' => $this->input->post('cmt')
						);
					$this->nhanvien_model->insert_nhanvien($data);
					redirect('admin/qlnhanvien');
				}
			}
		}

		public function suanhanvien(){
			$id = $this->uri->segment('4');
			$data['nhanvien'] = $this->nhanvien_model->hienthinhanvien_id($id);
			$this->load->view('admin/suanhanvien', $data);

			if($this->input->post('sua')){
				$data = array(
						'tennhanvien' => $this->input->post('tennhanvien'),
						'ngaysinh' => $this->input->post('date'),
						'gioitinh' => $this->input->post('gt'),
						'sodienthoai' => $this->input->post('dt'),
						'diachi' => $this->input->post('diachi'),
						'chungminhthu' => $this->input->post('cmt')
						);

					$this->nhanvien_model->suanhanvien($id,$data);
					redirect('admin/qlnhanvien');
			}
		}

			public function xoanhanvien(){
			$id = $this->uri->segment('4');
			$this->nhanvien_model->xoanhanvien($id);
			redirect('admin/qlnhanvien');
		}








	}


?>