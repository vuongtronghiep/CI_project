<?php
	class Donhang_model extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function countAll(){
				return $this->db->count_all('order');
		}
		public function showorder($limit,$offset){
			$this->db->select('*');
			$this->db->from('order');
			$this->db->join('chitiet_order', 'order.order_id = chitiet_order.order_id');
			$this->db->join('khachhang', 'order.id_khachhang = khachhang.id');
			$this->db->join('sanpham', 'chitiet_order.id_sanpham = sanpham.id_sanpham');
			$this->db->limit($limit,$offset);
			$this->db->group_by("order.order_id");        
			$this->db->order_by("order.order_id", "desc"); 
			return $this->db->get();      	
		}

		public function tongtien($order_id){
			$this->db->select('sum(gia*soluong) as tong');
			//$this->db->select_sum('chitiet_order.gia*chitiet_order.soluong');
			$this->db->from ('order');
			$this->db->join('chitiet_order', 'chitiet_order.order_id = order.order_id');
			$this->db->where('order.order_id',$order_id);
			$this->db->group_by("order.order_id");
			return $this->db->get()->result_array();		
		}

		public function showdetail($order_id){
			$this->db->select('*');
			$this->db->from('chitiet_order');
			$this->db->join('order', 'order.order_id = chitiet_order.order_id');
			$this->db->join('khachhang', 'order.id_khachhang = khachhang.id');
			$this->db->join('sanpham', 'chitiet_order.id_sanpham = sanpham.id_sanpham');
			$this->db->where('order.order_id',$order_id);
			return $this->db->get();      	
		}

		public function xoa($id){
			$this->db->where('order_id', $id);
			$this->db->delete('order');
		}

		public function capnhat($id,$b){
			$this->db->where('order_id',$id);
			$this->db->update('order',$b);
		}

		public function timkhachhang($value){
			$this->db->select('*');
			$this->db->from('order');
			$this->db->join('chitiet_order', 'order.order_id = chitiet_order.order_id');
			$this->db->join('khachhang', 'order.id_khachhang = khachhang.id');
			$this->db->join('sanpham', 'chitiet_order.id_sanpham = sanpham.id_sanpham');
			$this->db->like('khachhang.hoten',$value);
			return $this->db->get()->result_array();      	
		}
		public function timngaydat($value){
			$this->db->select('*');
			$this->db->from('order');
			$this->db->join('chitiet_order', 'order.order_id = chitiet_order.order_id');
			$this->db->join('khachhang', 'order.id_khachhang = khachhang.id');
			$this->db->join('sanpham', 'chitiet_order.id_sanpham = sanpham.id_sanpham');
			$this->db->like('order.ngay_order',$value);
			$this->db->group_by('order.order_id');
			return $this->db->get()->result_array();      	
		}
		public function timngayduyet($value){
			$this->db->select('*');
			$this->db->from('order');
			$this->db->join('chitiet_order', 'order.order_id = chitiet_order.order_id');
			$this->db->join('khachhang', 'order.id_khachhang = khachhang.id');
			$this->db->join('sanpham', 'chitiet_order.id_sanpham = sanpham.id_sanpham');
			$this->db->like('order.ngayduyet',$value);
			$this->db->group_by('order.order_id');
			return $this->db->get()->result_array();      	
		}
		public function timtinhtrang($value){
			$this->db->select('*');
			$this->db->from('order');
			$this->db->join('chitiet_order', 'order.order_id = chitiet_order.order_id');
			$this->db->join('khachhang', 'order.id_khachhang = khachhang.id');
			$this->db->join('sanpham', 'chitiet_order.id_sanpham = sanpham.id_sanpham');
			$this->db->like('order.tinhtrang_order',$value);
			$this->db->group_by('order.order_id');
			return $this->db->get()->result_array();      	
		}


	}
 ?>