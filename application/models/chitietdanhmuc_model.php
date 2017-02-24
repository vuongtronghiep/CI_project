<?php
	class Chitietdanhmuc_model extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function hienthisanpham($kytu){
			$this->db->select('*');
			$this->db->from('sanpham');
			$this->db->join('danhmuc','sanpham.id_theloai = danhmuc.id_theloai');
			$this->db->where('tendanhmuc_kytu',$kytu); 
			return $this->db->get();
		}
		public function hienthisanpham1($kytu){
			$this->db->select('*');
			$this->db->from('sanpham');
			$this->db->join('danhmuc','sanpham.id_theloai = danhmuc.id_theloai');
			$this->db->where('tendanhmuc_kytu',$kytu);
			$this->db->group_by("sanpham.id_theloai"); 
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
			$this->db->limit('7','5');
			return $this->db->get('sanpham');

		}
		public function countAll($kytu){
			$this->db->select('*');
			$this->db->from('sanpham');
			$this->db->join('danhmuc', 'danhmuc.id_theloai = sanpham.id_theloai');
			//$this->db->where('tendanhmuc_kytu',);
			$this->db->like('tendanhmuc_kytu', $kytu);
			return $this->db->count_all_results();
		}
		function hienThisp($limit,$offset,$kytu){
			$this->db->select('*');
			$this->db->from('sanpham');
			$this->db->join('danhmuc', 'danhmuc.id_theloai = sanpham.id_theloai');
			$this->db->where('tendanhmuc_kytu',$kytu);
            $this->db->limit($limit,$offset);
			$this->db->order_by("id_sanpham", "desc"); 
			return $this->db->get();      
		}

		public function sanphamnoibat(){
			$this->db->select('*');
			$this->db->join('danhmuc', 'danhmuc.id_theloai = sanpham.id_theloai');
			$this->db->order_by('luotxem',"desc");
			$this->db->limit('9');
			return $this->db->get('sanpham');
		}
	}
 ?>