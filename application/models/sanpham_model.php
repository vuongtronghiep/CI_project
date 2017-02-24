<?php
	class Sanpham_model extends CI_Model{
		function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        public function hienThiSanPham($limit,$offset)
        {
        	$this->db->select('*');
			$this->db->from('sanpham');
			$this->db->join('danhmuc', 'danhmuc.id_theloai = sanpham.id_theloai');
            $this->db->limit($limit,$offset);
			$this->db->order_by("id_sanpham", "desc"); 
			return $this->db->get();      	
        }
        public function countAll(){
            return $this->db->count_all('sanpham');
        }
        public function theloai(){
            $this->db->order_by("tentheloai", "ASC"); 
        	return $this->db->get('danhmuc');
        }

        public function hienthisp_id($id){
        	$this->db->select('*');
			$this->db->from('sanpham');
			$this->db->join('danhmuc', 'danhmuc.id_theloai = sanpham.id_theloai');
			$this->db->where('id_sanpham', $id);
			return $this->db->get();    

        	
        }

        public function themsanpham($data){
        	 $this->db->insert('sanpham', $data); 
        }

        public function suaSanPham($id_sanpham,$data){
        	$this->db->where('id_sanpham', $id_sanpham);
			$this->db->update('sanpham', $data);		 
        }

        public function xoaSanPham($id){
        	$this->db->where('id_sanpham', $id);
			$this->db->delete('sanpham');
        }

        public function timkiemsanpham($search){
            $this->db->select('*');
            $this->db->from('sanpham');
            $this->db->join('danhmuc', 'danhmuc.id_theloai = sanpham.id_theloai');
            $this->db->like('tensanpham',$search);
             //$this->db->limit($limit,$offset);
            return $this->db->get();        
        }
        public function timkiemtheloai($search){
            $this->db->select('*');
            $this->db->from('sanpham');
            $this->db->join('danhmuc', 'danhmuc.id_theloai = sanpham.id_theloai');
            $this->db->like('tentheloai',$search);
             //$this->db->limit($limit,$offset);
            return $this->db->get();        
        }
	}
 ?>