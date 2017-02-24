<?php 
Class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
	}

	public function index(){
		$this->load->model('home_model');
		$data['taikhoan'] = $this->home_model->tongTaiKhoan();
		$data['sanpham'] = $this->home_model->tongSanPham();
		$data['danhmuc'] = $this->home_model->tongDanhMuc();
		$data['order'] = $this->home_model->tongOrder();
		$data['user'] = $this->home_model->tongUser();
		$data['ngay'] = $this->home_model->tongngay();
		$data['ky'] = $this->home_model->tongky();
		$this->load->view('admin/home', $data);
	}

}
?>