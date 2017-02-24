<?php
	class Admin_model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function hienthiadmin(){
				$this->db->order_by('id',"asc");
			return $this->db->get('account');
		}

		public function xoaadmin($id){
			$this->db->where('id',$id);
			return $this->db->get('account');
		}
	}
 ?>