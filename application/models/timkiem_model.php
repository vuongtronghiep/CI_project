<?php
	class Timkiem_model extends CI_Model{
		function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

		public function search($search){
			$this->db->select('*');
			$this->db->join('danhmuc', 'danhmuc.id_theloai = sanpham.id_theloai');
			$this->db->like('tensanpham',$search);
			$this->db->limit('25');
			return $this->db->get('sanpham');

		}
}
