<?php
	class Danhmuc_model extends CI_Model{
		function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function hienThiDanhMuc($limit, $ofset){
        	$this->db->limit($limit, $ofset);
        	$this->db->order_by("id_theloai", "desc"); 
        	$query =  $this->db->get('danhmuc');
        	return $query->result_array();
        }

        public function countAll(){
        	return $this->db->count_all('danhmuc');
        }


        public function hienthidm($id){
        	$this->db->where('id_theloai',$id);
        	return $this->db->get('danhmuc');	
        }
        
        public function themDanhMuc($data){
        	$this->db->insert('danhmuc',$data);
        }

        public function suaDanhMuc($id,$data){
        	$this->db->where('id_theloai', $id);
			$this->db->update('danhmuc', $data); 
        }


        public function xoadanhmuc($id){
        	$this->db->where('id_theloai', $id);
			$this->db->delete('danhmuc');
        }

        public function timdanhmuc($danhmuc){
            $this->db->select('*');
            $this->db->from('danhmuc');
            $this->db->like('tentheloai',$danhmuc);
            return $this->db->get()->result_array();
        }

	}
 ?>