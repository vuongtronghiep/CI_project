<?php
class In_model extends CI_Model {
    function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function in($id){
        	$this->db->select('*');
        	$this->db->from('order');
			$this->db->join('chitiet_order', 'order.order_id = chitiet_order.order_id');
			$this->db->join('khachhang', 'order.id_khachhang = khachhang.id');
			$this->db->join('sanpham', 'chitiet_order.id_sanpham = sanpham.id_sanpham');
			$this->db->where('order.order_id',$id);
			return $this->db->get();
        }
        public function info($id){
        	$this->db->select('*');
        	$this->db->from('order');
			$this->db->join('khachhang', 'order.id_khachhang = khachhang.id');
			$this->db->where('order.order_id',$id);
			return $this->db->get();
        }
    }

?>