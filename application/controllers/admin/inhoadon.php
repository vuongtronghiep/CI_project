<?php
	class Inhoadon extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('in_model');
			$this->load->model('donhang_model');
			$this->load->helper('url');
			$this->load->library('pagination');

		}
		public function in(){
			$id = $this->input->post('order_id');
			if($this->input->post('submitduyet')){
					$b= array(
						'order_id' => $this->input->post('order_id'),
						'id_khachhang' => $this->input->post('id_kh'),
						'ngay_order' => $this->input->post('ngayorder'),
						'tinhtrang_order' => 'Đã duyệt',
						'tongtien' => $this->input->post('tongtien'),
						'ngayduyet' =>date('d-m-y')
						);	
						$this->donhang_model->capnhat($id,$b);											
			}
			$id = $this->input->post('order_id');
			$data['tongtien'] = $this->donhang_model->tongtien($id);
			$data['test'] = $this->in_model->in($id);
			$data['info'] = $this->in_model->info($id);
			$this->load->view('admin/in',$data);

		}
	}
 ?>