<?php
	class Thongke_model extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function tk_datdonhang($date){
			 $this->db->where('ngay_order', $date);
			 return $this->db->count_all_results('order');
		}
		public function tk_duyetdonhang($date){
			 $this->db->where('ngay_order', $date);
			 $this->db->where('tinhtrang_order', 'Đã duyệt');
			 return $this->db->count_all_results('order');
		}
		public function tk_sanphamdat($date){
			$this->db->select_sum('soluong');
			$this->db->from('chitiet_order');
			$this->db->join('order','chitiet_order.order_id = order.order_id');
			$this->db->where('ngay_order',$date);
			return $this->db->get()->result_array();
		}
		public function tk_khachhangdat($date){
			$this->db->select('count id_khachhang');
			 $this->db->where('ngay_order', $date);
			 return $this->db->count_all_results('order');
		}
		public function tk_tongtien($date){
			$this->db->select('sum(gia*soluong) as tong');
			$this->db->from('chitiet_order');
			$this->db->join('order','chitiet_order.order_id = order.order_id');
			$this->db->where('ngay_order',$date);
			return $this->db->get()->result_array();
		}
		public function tk_tongtienduyet($date){
			$this->db->select('sum(gia*soluong) as tong');
			$this->db->from('chitiet_order');
			$this->db->join('order','chitiet_order.order_id = order.order_id');
			$this->db->where('ngay_order',$date);
			$this->db->where('tinhtrang_order','Đã duyệt');
			return $this->db->get()->result_array();
		}



		public function tk_datdonhangtheoky($from,$to){
			 $this->db->where('ngay_order >=', $from);
			 $this->db->where('ngay_order <=', $to);
			 return $this->db->count_all_results('order');
		}
		public function tk_duyetdonhangtheoky($from,$to){
			 $this->db->where('ngay_order >=', $from);
			 $this->db->where('ngay_order <=', $to);
			 $this->db->where('tinhtrang_order', 'Đã duyệt');
			 return $this->db->count_all_results('order');
		}
		public function tk_sanphamdattheoky($from,$to){
			$this->db->select_sum('soluong');
			$this->db->from('chitiet_order');
			$this->db->join('order','chitiet_order.order_id = order.order_id');
			 $this->db->where('ngay_order >=', $from);
			 $this->db->where('ngay_order <=', $to);
			return $this->db->get()->result_array();
		}
		public function tk_khachhangdattheoky($from,$to){
			$this->db->select('count id_khachhang');
			 $this->db->where('ngay_order >=', $from);
			 $this->db->where('ngay_order <=', $to);
			 return $this->db->count_all_results('order');
		}
		public function tk_tongtientheoky($from,$to){
			$this->db->select('sum(gia*soluong) as tong');
			$this->db->from('chitiet_order');
			$this->db->join('order','chitiet_order.order_id = order.order_id');
			 $this->db->where('ngay_order >=', $from);
			 $this->db->where('ngay_order <=', $to);
			return $this->db->get()->result_array();
		}
		public function tk_tongtienduyettheoky($from,$to){
			$this->db->select('sum(gia*soluong) as tong');
			$this->db->from('chitiet_order');
			$this->db->join('order','chitiet_order.order_id = order.order_id');
			 $this->db->where('ngay_order >=', $from);
			 $this->db->where('ngay_order <=', $to);
			$this->db->where('tinhtrang_order','Đã duyệt');
			return $this->db->get()->result_array();
		}

		public function luu($data){
			$this->db->insert('thongke_hangngay',$data);
		}
		public function luutheoky($data){
			$this->db->insert('thongke_theoky',$data);
		}

		public function hienthi_thongke_hangngay(){
			return $this->db->get('thongke_hangngay');
		}
		public function hienthi_thongke_theoky(){
			return $this->db->get('thongke_theoky');
		}

		public function xoathongkengay($date){
			$this->db->where('ngay_thongke',$date);
			$this->db->delete('thongke_hangngay');
		}


		public function xoathongkeky($id){
			$this->db->where('thongke_id',$id);
			$this->db->delete('thongke_theoky');
		}

	}