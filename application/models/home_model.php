<?php
class Home_model extends CI_Model {
    function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

     public function tongTaiKhoan(){
		return $this->db->count_all_results('account');
     }
     public function tongSanPham(){
		return $this->db->count_all_results('sanpham');
     }
     public function tongDanhMuc(){
		return $this->db->count_all_results('danhmuc');
     }
     public function tongUser(){
        return $this->db->count_all_results('khachhang');
     }
     public function tongOrder(){
        return $this->db->count_all_results('order');
     }
     public function tongngay(){
        return $this->db->count_all_results('thongke_hangngay');
     }
     public function tongky(){
        return $this->db->count_all_results('thongke_theoky');
     }
 }
?>