<?php
	class Trangchu_model extends CI_Model{
		function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        public function tongview(){
        	$this->db->select('luotxem');
        	return $this->db->get('logo');
        }
        public function luotview($data1){
        	$this->db->update('logo',$data1);
        }
        public function view(){

        }
		public function themthanhvien($data){
			 $this->db->insert('thanhvien', $data); 
		}
		public function tongsanpham(){
			return $this->db->count_all('sanpham');
		}

		public function hienthicategory(){
			$this->db->select('*');
			$this->db->from('danhmuc');
			$this->db->order_by("tentheloai", "ASC"); 
			return $this->db->get();
		}

		public function solanxem($id){
		$this->db->select('luotxem');
		$this->db->where('id_sanpham', $id);
		return $this->db->get('sanpham');
		}

		public function tangluotxem($id,$data){
			$this->db->where('id_sanpham',$id);
			$this->db->update('sanpham',$data);
		}

		public function sanphammoinhat(){
			$this->db->select('*');
			$this->db->join('danhmuc', 'danhmuc.id_theloai = sanpham.id_theloai');
			$this->db->order_by('id_sanpham',"desc");
			return $this->db->get('sanpham','9');
		}
		public function sanphamcu($offset2){
			$this->db->select('*');
			$this->db->join('danhmuc', 'danhmuc.id_theloai = sanpham.id_theloai');
			$this->db->order_by('id_sanpham',"desc");
			$this->db->limit('28',$offset2);
			return $this->db->get('sanpham');
		}

		public function sanphamnoibat(){
			$this->db->select('*');
			$this->db->join('danhmuc', 'danhmuc.id_theloai = sanpham.id_theloai');
			$this->db->order_by('luotxem',"desc");
			$this->db->limit('3');
			return $this->db->get('sanpham');
		}
		public function slider(){
			$this->db->select('*');
			$this->db->join('danhmuc', 'danhmuc.id_theloai = sanpham.id_theloai');
			$this->db->order_by('id_sanpham',"desc");
			$this->db->limit('7','15');
			return $this->db->get('sanpham');

		}

		public function search($search){
			$this->db->select('*');
			$this->db->join('danhmuc', 'danhmuc.id_theloai = sanpham.id_theloai');
			$this->db->like('tensanpham',$search);
			$this->db->limit('15');
			return $this->db->get('sanpham');

		}



	}

 ?>