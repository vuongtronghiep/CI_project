<?php
	class User_model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function countAll(){
			return $this->db->count_all('khachhang');
		}
		public function hienThiUser($limit,$ofset){			
        	$this->db->select('*');
			$this->db->from('khachhang');
			$this->db->order_by('id','DESC');
            $this->db->limit($limit,$ofset);
			return $this->db->get();
		}

		public function xoaUser($id){
			$this->db->where('id', $id);
			$this->db->delete('khachhang');
		}

		public function timten($value){
			$this->db->select('*');
			$this->db->from('khachhang');
			$this->db->order_by('id','DESC');
            $this->db->like('hoten',$value);
			return $this->db->get()->result_array();
		}
		public function timemail($value){
			$this->db->select('*');
			$this->db->from('khachhang');
			$this->db->order_by('id','DESC');
            $this->db->like('email',$value);
			return $this->db->get()->result_array();
		}
		public function timdiachi($value){
			$this->db->select('*');
			$this->db->from('khachhang');
			$this->db->order_by('id','DESC');
            $this->db->like('diachi',$value);
			return $this->db->get()->result_array();
		}
		public function timngaytao($value){
			$this->db->select('*');
			$this->db->from('khachhang');
			$this->db->order_by('id','DESC');
            $this->db->like('ngay_tao',$value);
			return $this->db->get()->result_array();
		}
	}
 ?>