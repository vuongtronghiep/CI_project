<?php
	class Chitietsanpham_model extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function chitietsanpham($id){
			$this->db->select('*');
			$this->db->from('sanpham');
			$this->db->join('danhmuc','danhmuc.id_theloai = sanpham.id_theloai');
			$this->db->where('id_sanpham',$id);
			return $this->db->get();
		}
		public function hienthicategory(){
			$this->db->select('*');
			$this->db->from('danhmuc');
			$this->db->order_by("tentheloai", "ASC"); 
			return $this->db->get();
		}
		
		public function slider(){
		$this->db->select('*');
		$this->db->join('danhmuc', 'danhmuc.id_theloai = sanpham.id_theloai');
		$this->db->order_by('id_sanpham',"desc");
		$this->db->limit('7','15');
		return $this->db->get('sanpham');

		}
		public function hienthidanhmuc($kytu){
			$this->db->select('*');
			$this->db->from('sanpham');
			$this->db->join('danhmuc','sanpham.id_theloai = danhmuc.id_theloai');
			$this->db->where('tendanhmuc_kytu',$kytu);
			$this->db->group_by("sanpham.id_theloai"); 
			return $this->db->get();
		}
		public function countallcate($kytu){
			$this->db->select('*');
			$this->db->from('sanpham');
			$this->db->join('danhmuc','sanpham.id_theloai = danhmuc.id_theloai');
			$this->db->where('tendanhmuc_kytu',$kytu);
			return $this->db->count_all_results();
		}

		public function tongsanphamgiamgia(){
			$this->db->select('*');
			$this->db->from('sanpham');
			$this->db->join('danhmuc','sanpham.id_theloai = danhmuc.id_theloai');
			$this->db->where('khuyenmai >',0);
			return $this->db->count_all_results();
		}

		public function sanphamlienquan($kytu){
			$this->db->select('*');
			$this->db->from('sanpham');
			$this->db->join('danhmuc','sanpham.id_theloai = danhmuc.id_theloai');
			$this->db->where('tendanhmuc_kytu',$kytu);
			$this->db->limit('6');
			$this->db->order_by("id_sanpham", "desc"); 
			return $this->db->get();
		}

		public function giamgia($limit,$offset){
			$this->db->select('*');
			$this->db->from('sanpham');
			$this->db->join('danhmuc','sanpham.id_theloai = danhmuc.id_theloai');
			$this->db->where('khuyenmai >','0');
			$this->db->limit($limit,$offset);
			$this->db->order_by("id_sanpham", "desc"); 
			return $this->db->get();
		}

		public function solanxem($id){
			$this->db->select('*');
			$this->db->from('sanpham');
			$this->db->where('id_sanpham', $id);
			return $this->db->get()->result_array();
		}

		public function tangluotxem($id,$data1){
			$this->db->where('id_sanpham',$id);
			$this->db->update('sanpham',$data1);
		}
		public function sanphamnoibat(){
			$this->db->select('*');
			$this->db->join('danhmuc', 'danhmuc.id_theloai = sanpham.id_theloai');
			$this->db->order_by('luotxem',"desc");
			$this->db->limit('13');
			return $this->db->get('sanpham');
		}
			public function sanphamnoibat1(){
			$this->db->select('*');
			$this->db->join('danhmuc', 'danhmuc.id_theloai = sanpham.id_theloai');
			$this->db->order_by('luotxem',"desc");
			$this->db->limit('10');
			return $this->db->get('sanpham');
		}



	}
 ?>