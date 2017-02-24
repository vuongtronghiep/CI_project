<?php
	class Qlsanpham extends CI_Controller{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('sanpham_model');
			$this->load->helper('form');
			$this->load->helper('url');	
			$this->load->library('pagination');		
		}

		public function index(){
			$config = array();
			$config['base_url']    = "admin/qlsanpham/index";
			$config['total_rows']  = $this->sanpham_model->countAll();
			$config['per_page']    = 5;
			$config['next_link']   = "Trang Tiếp";
			$config['prev_link']   = "Trang trước";	
			$this->pagination->initialize($config);
			$limit = $config['per_page']    = 5;
			$offset = $this->uri->segment(4);	
			$data['sanpham'] = $this->sanpham_model->hienThiSanPham($limit,$offset);
			$links = $this->pagination->create_links();
			$lks = $links;
			$lks = '<ul class="pagination">'.$links;
			$lks = str_replace('<a hr','<li><a hr', $lks);
			$lks = str_replace('</a>','</a></li>', $lks);
			$lks .= '</ul>';
			$data['links'] = $lks;			
			$this->load->view('admin/sanpham', $data);	
		}

		public function themsanpham(){
			$data['danhmuc'] = $this->sanpham_model->theloai();
			$this->load->view('admin/themsanpham', $data,TRUE);

			$this->form_validation->set_rules('tensanpham', 'Tên Sản Phẩm', 'required');
			$this->form_validation->set_rules('gia','Giá',  'required|max_length[25]');
			$this->form_validation->set_rules('tt', 'Tình trạng', 'required|max_length[3]');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('admin/themsanpham');
			}else{	
				if($this->input->post('them')){	
					//ảnh minh họa
				         $config = array();
				         //thuc mục chứa file
				         $config['upload_path']   = './public/template/back-end/image/sanpham';
				         //Định dạng file được phép tải
				         $config['allowed_types'] = 'jpg|png|gif';
				         //Dung lượng tối đa
				         $config['max_size']      = '500';
				         //Chiều rộng tối đa
				         $config['max_width']     = '1028';
				         //Chiều cao tối đa
				         $config['max_height']    = '1028';
				         //load thư viện upload
				         $this->load->library('upload', $config);
				         //thuc hien upload
				         if($this->upload->do_upload('image')) {
				             //chua mang thong tin upload thanh con
				             $data = $this->upload->data();
				         }else{
				            //hien thi lỗi nếu có
				            $error = $this->upload->display_errors();
				            echo $error;
				         }
				 		$anhminhhoa = $data['file_name'];
				      
				      // ảnh kèm theo    				  
						 $config = array();
				         //thuc mục chứa file
				         $config['upload_path']   = './public/template/back-end/image/sanpham';
				         //Định dạng file được phép tải
				         $config['allowed_types'] = 'jpg|png|gif';
				         //Dung lượng tối đa
				         $config['max_size']      = '500';
				         //Chiều rộng tối đa
				         $config['max_width']     = '1028';
				         //Chiều cao tối đa
				         $config['max_height']    = '1028';
				         //load thư viện upload
				         $this->load->library('upload', $config);
				         //thuc hien upload
				         if($this->upload->do_upload('anhkemtheo2')) {
				             //chua mang thong tin upload thanh con
				             $data = $this->upload->data();
				         }else{
				            //hien thi lỗi nếu có
				            $error = $this->upload->display_errors();
				            echo $error;
				        }
				         $anhkemtheo2 = $data['file_name'];

				     // ảnh kèm theo    				  
						 $config = array();
				         //thuc mục chứa file
				         $config['upload_path']   = './public/template/back-end/image/sanpham';
				         //Định dạng file được phép tải
				         $config['allowed_types'] = 'jpg|png|gif';
				         //Dung lượng tối đa
				         $config['max_size']      = '500';
				         //Chiều rộng tối đa
				         $config['max_width']     = '1028';
				         //Chiều cao tối đa
				         $config['max_height']    = '1028';
				         //load thư viện upload
				         $this->load->library('upload', $config);
				         //thuc hien upload
				         if($this->upload->do_upload('anhkemtheo')) {
				             //chua mang thong tin upload thanh con
				             $data = $this->upload->data();
				         }else{
				            //hien thi lỗi nếu có
				            $error = $this->upload->display_errors();
				            echo $error;
				         }			         									
									
				 			 $anhkemtheo = $data['file_name'];
						     $tensanpham = $this->input->post('tensanpham');
							 $theloai    = $this->input->post('theloai');
							 $gia        = $this->input->post('gia');
							 $baohanh    = $this->input->post('baohanh');
							 $khuyenmai  = $this->input->post('km');
						     $tinhtrang  = $this->input->post('tt');
						     $tmp = ($gia / 100) * $khuyenmai ;
							 $sale		 = $gia - $tmp;
						  	 $data = array(
							 		'tensanpham'=> $tensanpham,
									'id_theloai'=> $theloai,
									'gia'=> $gia,
							 		'baohanh'=> $baohanh,
							 		'khuyenmai'=> $khuyenmai,
							 		'tinhtrang'=> $tinhtrang,
							 		'anhbia'=> $anhminhhoa,
							 		'anhchitiet' =>$anhkemtheo,
							 		'anhchitiet2' =>$anhkemtheo2,
							 		'giasaukhuyenmai' =>$sale
							 	);
						 	 $this->sanpham_model->themsanpham($data);
						  	 redirect('admin/qlsanpham');

				}
			
			}
		}

		public function suaSanPham(){
			$id = $this->uri->segment('4');
			$data['sanpham'] = $this->sanpham_model->hienthisp_id($id);
			$data['a'] = $this->sanpham_model->theloai();
			$this->load->view('admin/suasanpham', $data);

			if($this->input->post('sua')){

				$image_name = $this->input->post('update_photo_name');
				if(isset($_FILES['anhbia']))
				{
					$config = array();
			        $config['upload_path']   = './public/template/back-end/image/sanpham';
					$config['allowed_types'] = 'jpg|png|gif';
			        $config['max_size']      = '10240';
			        $config['max_width']     = '2000';
			        $config['max_height']    = '2000';
			        $this->load->library('upload', $config);
			        if($this->upload->do_upload('anhbia'))
		     		{
		           		$data_upload = $this->upload->data();
		           		$image_name = $data_upload['file_name'];
		           		$config['image_library'] = 'gd2';
						$config['source_image'] = './public/template/back-end/image/sanpham'.$image_name;
						$config['create_thumb'] = FALSE;
						$config['maintain_ratio'] = FALSE;
						$config['width']         = 100;
						$config['height']       = 100;
						$config['new_image'] = 'thumb_'.$image_name;
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
		     		}
		     		else
		     		{
			            $error = $this->upload->display_errors();
			            echo $error;
		     		}
		     	}

		     	// anhr chi tiet
		     	$image_kemtheo = $this->input->post('anhkemtheo_2');
				if(isset($_FILES['anhkemtheo']))
				{
					$config = array();
			        $config['upload_path']   = './public/template/back-end/image/sanpham';
					$config['allowed_types'] = 'jpg|png|gif';
			        $config['max_size']      = '10240';
			        $config['max_width']     = '2000';
			        $config['max_height']    = '2000';
			        $this->load->library('upload', $config);
			        if($this->upload->do_upload('anhkemtheo'))
		     		{
		           		$data_upload = $this->upload->data();
		           		$image_kemtheo = $data_upload['file_name'];
		           		$config['image_library'] = 'gd2';
						$config['source_image'] = './public/template/back-end/image/sanpham'.$image_kemtheo;
						$config['create_thumb'] = FALSE;
						$config['maintain_ratio'] = FALSE;
						$config['width']         = 100;
						$config['height']       = 100;
						$config['new_image'] = 'thumb_'.$image_kemtheo;
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
		     		}
		     		else
		     		{
			            $error = $this->upload->display_errors();
			            echo $error;
		     		}

		     		$image_kemtheo1 = $this->input->post('anhkemtheo_3');
				if(isset($_FILES['anhkemtheo1']))
				{
					$config = array();
			        $config['upload_path']   = './public/template/back-end/image/sanpham';
					$config['allowed_types'] = 'jpg|png|gif';
			        $config['max_size']      = '10240';
			        $config['max_width']     = '2000';
			        $config['max_height']    = '2000';
			        $this->load->library('upload', $config);
			        if($this->upload->do_upload('anhkemtheo1'))
		     		{
		           		$data_upload = $this->upload->data();
		           		$image_kemtheo1 = $data_upload['file_name'];
		           		$config['image_library'] = 'gd2';
						$config['source_image'] = './public/template/back-end/image/sanpham'.$image_kemtheo1;
						$config['create_thumb'] = FALSE;
						$config['maintain_ratio'] = FALSE;
						$config['width']         = 100;
						$config['height']       = 100;
						$config['new_image'] = 'thumb_'.$image_kemtheo1;
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
		     		}
		     		else
		     		{
			            $error = $this->upload->display_errors();
			            echo $error;
		     		}
		     	}
				$id = $this->uri->segment('4');
				$tensanpham = $this->input->post('tensanpham');
				$theloai    = $this->input->post('theloai');
				$gia        = $this->input->post('gia');
				$baohanh    = $this->input->post('baohanh');
				$khuyenmai  = $this->input->post('km');
				$tinhtrang  = $this->input->post('tt');
				$data = array(
						 	'tensanpham'=> $tensanpham,
						 	'id_theloai'=> $theloai,
						 	'gia'=> $gia,
						 	'baohanh'=> $baohanh,
						 	'khuyenmai'=> $khuyenmai,
						 	'tinhtrang'=> $tinhtrang,
						 	'anhbia'=> $image_name,
						 	'anhchitiet' =>$image_kemtheo,
						 	'anhchitiet2' =>$image_kemtheo1
						 	);
				$this->sanpham_model->suaSanPham($id,$data);
				redirect('admin/qlsanpham');				 
			}
			
		}
}
		public function xoaSanPham(){
			$id = $this->uri->segment('4');
			$this->sanpham_model->xoaSanPham($id);
			redirect('admin/qlsanpham');
		}

		public function timsanpham(){
			$search =$this->input->get('txt_search');
			if($this->input->get('subtimkiem')){
				if($this->input->get('giatri') =='tensanpham'){
					$data['search'] = $this->sanpham_model->timkiemsanpham($search);
					$this->load->view('admin/timkiemsanpham',$data);
				}elseif($this->input->get('giatri') =='theloai'){
					$data['search'] = $this->sanpham_model->timkiemtheloai($search);
					$this->load->view('admin/timkiemsanpham',$data);
				}

			}

		}
	
	}
 ?>