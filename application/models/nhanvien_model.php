<?php
	class Nhanvien_model extends CI_Model{
		function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function hienthi(){
        	return $this->db->get('nhanvien_giaohang');
        }

        public function insert_nhanvien($data){
        	$this->db->insert('nhanvien_giaohang',$data);
        }

        public function hienthinhanvien_id($id){
        	$this->db->select('*');
			$this->db->from('nhanvien_giaohang');
			$this->db->where('id', $id);
			return $this->db->get();           	
        }

         public function suanhanvien($id,$data){
         	$this->db->where('id',$id);
        	$this->db->update('nhanvien_giaohang',$data);
        }

        public function xoanhanvien($id){
        	$this->db->where('id',$id);
        	$this->db->delete('nhanvien_giaohang');
        }
    }
?>