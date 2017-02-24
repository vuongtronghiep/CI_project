<?php
	class Qlthongke extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('thongke_model');
		}

		public function index(){
			$data['tk_hangngay'] = $this->thongke_model->hienthi_thongke_hangngay();
			$data['tk_theoky'] = $this->thongke_model->hienthi_thongke_theoky();
			$this->load->view('admin/baocao_thongke',$data);
		}
		public function thongke(){
	
			if($this->input->post('thongke')){
				$date = $this->input->post('a');
				$data['ngay'] = $this->input->post('a');
				$data['donhangduocdat'] = $this->thongke_model->tk_datdonhang($date);
				$data['donhangduocduyet'] = $this->thongke_model->tk_duyetdonhang($date);
				$data['sanphamduocdat'] = $this->thongke_model->tk_sanphamdat($date);
				$data['khachhangdat'] = $this->thongke_model->tk_khachhangdat($date);
				$data['tongtien'] = $this->thongke_model->tk_tongtien($date);
				$data['tongduyet'] = $this->thongke_model->tk_tongtienduyet($date);
				
				$this->load->view('admin/ketqua_thongke',$data);
			}

			if($this->input->post('luu')){
				$ngay = $this->input->post('a');
				$dat =  $this->input->post('dat');
				$tienduyet =  $this->input->post('tienduyet');
				$tiendat = $this->input->post('tiendat');
				$kh = $this->input->post('khachhang');
				$duyet = $this->input->post('duyet');
				$sp = $this->input->post('sanpham');

				$data = array(
						'ngay_thongke' => $ngay,
						'donhang_duocdat' => $dat,
						'donhang_duocduyet' => $duyet,
						'sanpham_duocdat' =>$sp,
						'tongtien_hoadonduyet' =>$tienduyet,
						'tongtien_hoadondat' => $tiendat,
						'sokhachhang_dat' => $kh,
						
					);
				$this->thongke_model->luu($data);
				redirect('admin/qlthongke');
			}
		}

		public function thongketheoky(){
	
			if($this->input->post('thongke')){
				$to = $this->input->post('to');
				$data['to'] = $this->input->post('to');
				$from = $this->input->post('from');
				$data['from'] = $this->input->post('from');

				$data['donhangduocdat'] = $this->thongke_model->tk_datdonhangtheoky($from,$to);
				$data['donhangduocduyet'] = $this->thongke_model->tk_duyetdonhangtheoky($from,$to);
				$data['sanphamduocdat'] = $this->thongke_model->tk_sanphamdattheoky($from,$to);
				$data['khachhangdat'] = $this->thongke_model->tk_khachhangdattheoky($from,$to);
				$data['tongtien'] = $this->thongke_model->tk_tongtientheoky($from,$to);
				$data['tongduyet'] = $this->thongke_model->tk_tongtienduyettheoky($from,$to);
				
				$this->load->view('admin/ketqua_thongketheoky',$data);
			}
			if($this->input->post('luu')){
				$from = $this->input->post('from');
				$to = $this->input->post('to');
				$dat =  $this->input->post('dat');
				$tienduyet =  $this->input->post('tienduyet');
				$tiendat = $this->input->post('tiendat');
				$kh = $this->input->post('khachhang');
				$duyet = $this->input->post('duyet');
				$sp = $this->input->post('sanpham');

				$data = array(
						'thongke_tungay' => $from,
						'thongke_denngay' => $to,
						'tong_donhangdat' => $dat,
						'tong_donhangduyet' => $duyet,
						'sosanpham_dat' =>$sp,
						'tongtien_hoadonduyet' =>$tienduyet,
						'tongtien_hoadondat' => $tiendat,
						'sokhachhang_dat' => $kh,
						
					);
				$this->thongke_model->luutheoky($data);
				redirect('admin/qlthongke');
			}
		}

		public function xoathongke(){
			$date = $this->uri->segment(4);
			$this->thongke_model->xoathongkengay($date);
			redirect('admin/qlthongke');
		}


		public function xoathongke_theoky(){
			$id = $this->uri->segment(4);
			$this->thongke_model->xoathongkeky($id);
			redirect('admin/qlthongke');
		}



	}