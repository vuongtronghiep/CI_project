<?php
	class Sanpham extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('chitietsanpham_model');
			$this->load->helper('url');
			$this->load->library('pagination');

		}
		public function hienthi(){
			$id = $this->uri->segment('4');
			$data['chitietsp'] = $this->chitietsanpham_model->chitietsanpham($id);
			$data['category'] = $this->chitietsanpham_model->hienthicategory();
			$kytu = $this->uri->segment('3');
			$data['danhmuc'] = $this->chitietsanpham_model->hienthidanhmuc($kytu);
			$data['sanphamlienquan'] = $this->chitietsanpham_model->sanphamlienquan($kytu);
			$data['sanphamnoibat'] = $this->chitietsanpham_model->sanphamnoibat();

				 $id = $this->uri->segment('4');
				  $old_view = $this->chitietsanpham_model->solanxem($id);

				  foreach ($old_view as $row){					   
					     $new_view =$row['luotxem']+1;			
						 $data1 = array(
						 	'luotxem' => $new_view
				 			);
				$data['a'] = $this->chitietsanpham_model->tangluotxem($id,$data1);
					}
				
			$this->load->view('sanpham',$data);
		}

		public function giamgia(){
			$data['category'] = $this->chitietsanpham_model->hienthicategory();
			$data['sanphamnoibat'] = $this->chitietsanpham_model->sanphamnoibat1();
			$data['slider'] = $this->chitietsanpham_model->slider();

			$config['base_url']    = "sanpham/giamgia";
			 $config['total_rows']  = $this->chitietsanpham_model->tongsanphamgiamgia();
			$config['per_page']    = 15;	
			$config['prev_link']  = 'Lại';
        	$config['next_link']  = 'Tiếp';
	
			$this->pagination->initialize($config);
			$limit = $config['per_page']   =15;
			$offset = $this->uri->segment(3);	
			$data['giamgia'] = $this->chitietsanpham_model->giamgia($limit,$offset);

			$data['links'] = $this->pagination->create_links();
			// $lks = $links;
			// $lks = '<ul class="pagination">'.$links;
			// $lks = str_replace('<a hr','<li><a hr', $lks);
			// $lks = str_replace('</a>','</a></li>', $lks);
			// $lks .= '</ul>';
			// $data['links'] = $lks;	
			$this->load->view('giamgia', $data);
		}

	} 
 ?>