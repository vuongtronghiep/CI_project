<?php
	class Qldonhang extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('donhang_model');
			$this->load->helper('form');
			$this->load->helper('url');	
			$this->load->library("pagination");	
		}

		public function index(){
			
			$config['base_url']    = "admin/qldonhang/index";
			$config['total_rows']  = $this->donhang_model->countAll();
			$config['per_page']    = 5;	
			$config['prev_link']  = 'Lại';
        	$config['next_link']  = 'Tiếp';
	
			$this->pagination->initialize($config);
			$limit = $config['per_page']    =5;
			$offset = $this->uri->segment(4);
			$data['donhang'] = $this->donhang_model->showorder($limit, $offset);

			$links = $this->pagination->create_links();
			$lks = $links;
			$lks = '<ul class="pagination">'.$links;
			$lks = str_replace('<a hr','<li><a hr', $lks);
			$lks = str_replace('</a>','</a></li>', $lks);
			$lks .= '</ul>';
			$data['links'] = $lks;	

			$this->load->view('admin/donhang', $data);
		}
		public function xemchitietdonhang(){
			$order_id = $this->uri->segment(4);
			$data['chitiet'] = $this->donhang_model->showdetail($order_id);
			$data['tongtien'] = $this->donhang_model->tongtien($order_id);
			$this->load->view('admin/xemchitietdonhang',$data);
		}

		public function chitietdonhang(){
			$order_id = $this->uri->segment(4);
			$data['chitiet'] = $this->donhang_model->showdetail($order_id);
			$data['tongtien'] = $this->donhang_model->tongtien($order_id);
			$this->load->view('admin/chitietdonhang',$data);
		}
		public function xoadonhang(){
			$order_id = $this->uri->segment(4);
			$this->donhang_model->xoa($order_id);
			redirect('admin/qldonhang');
		}

		public function capnhat_donhang(){
			$id = $this->input->post('order_id');
			if($this->input->post('submitduyet')){
					$data= array(
						'order_id' => $this->input->post('order_id'),
						'id_khachhang' => $this->input->post('id_kh'),
						'ngay_order' => $this->input->post('ngayorder'),
						'tinhtrang_order' => $this->input->post('duyet'),
						'tongtien' => $this->input->post('tongtien'),
						'ngayduyet' =>date('d-m-y')
						);	
								
					$this->donhang_model->capnhat($id,$data);
					$d['b']= array(
						'order_id' => $this->input->post('order_id'),
						'id_khachhang' => $this->input->post('id_kh'),
						'ngay_order' => $this->input->post('ngayorder'),
						'tinhtrang_order' => $this->input->post('duyet'),
						'tongtien' => $this->input->post('tongtien'),
						'ngayduyet' =>date('d-m-y')
						);		
					redirect('admin/inhoadon/in',$d);
			}
		}


		public function timkiem(){
			$value = $this->input->get('txt_search');
			if($this->input->get('subtimkiem')){
				if($this->input->get('giatri') == "tenkhachhang"){					
					$data['search'] = $this->donhang_model->timkhachhang($value);
					$this->load->view('admin/timkiemdonhang',$data);
				}elseif($this->input->get('giatri') == "ngaydat"){					
					$data['search'] = $this->donhang_model->timngaydat($value);
					$this->load->view('admin/timkiemdonhang',$data);
				}elseif($this->input->get('giatri') == "ngayduyet"){					
					$data['search'] = $this->donhang_model->timngayduyet($value);
					$this->load->view('admin/timkiemdonhang',$data);
				}elseif($this->input->get('giatri') == "tinhtrang"){					
					$data['search'] = $this->donhang_model->timtinhtrang($value);
					$this->load->view('admin/timkiemdonhang',$data);
				}
			}
		}
		public function xuat(){
			$this->load->view('admin/xuat');
		}

	}
 ?>