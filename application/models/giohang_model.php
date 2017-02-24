<?php
	class Giohang_model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function hienthicategory(){
			$this->db->select('*');
			$this->db->from('danhmuc');
			$this->db->order_by("tentheloai", "ASC"); 
			return $this->db->get();
		}

		public function find($id){
			$this->db->where('id_sanpham',$id);
			return $this->db->get('sanpham')->row();
		}

		
		function insert_thanhtoan($customer)
        {
            $this->db->insert('khachhang', $customer);
            $id = $this->db->insert_id();
            return (isset($id)) ? $id : FALSE;
        }
    
    function insert_order($order)
        {
            $this->db->insert('order', $order);
            $id = $this->db->insert_id();
            return (isset($id)) ? $id : FALSE;
        }
    
    function insert_order_detail($order_detail)
        {
            $this->db->insert('chitiet_order', $order_detail);
        }    


	}
 ?>