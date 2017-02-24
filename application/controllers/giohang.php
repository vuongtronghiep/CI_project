<?php
	class Giohang extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('giohang_model');
			$this->load->library('cart');
			$this->load->library('table');

		}
		public function add(){
			$id = $this->uri->segment('3');
			$sanpham = $this->giohang_model->find($id);
			$data['category'] = $this->giohang_model->hienthicategory();
			$this->load->view('giohang',$data,TRUE);
			$data = array(
					'id' => $id,
					'name' => $sanpham->tensanpham,
					'price' => $sanpham->giasaukhuyenmai,
					'qty' =>1
				);
			$this->cart->insert($data);
			$this->load->view('giohang',$data);
		}

		public function delete(){

			$data['category'] = $this->giohang_model->hienthicategory();
			$this->load->view('giohang',$data,TRUE);
			$rowid = $this->uri->segment('3');
			$this->cart->update(array(
                        'rowid' => $rowid,
                        'qty' => 0
                    ));
  
               $this->load->view('giohang');
		}
		public function update(){
			if($this->uri->segment('2') == 'update'){
			$data['category'] = $this->giohang_model->hienthicategory();
			$this->load->view('giohang',$data,TRUE);

			$cart_info = $_POST['cart'] ;
            foreach( $cart_info as $id => $cart)
                {
                    $rowid = $cart['rowid'];
                    $price = $cart['price'];
                    $amount = $price * $cart['qty'];
                    $qty = $cart['qty'];
                    
                    $data = array(
                    'rowid' => $rowid,
                    'price' => $price,
                    'amount' => $amount,
                    'qty' => $qty
                    ); 
                    $this->cart->update($data);
			$this->load->view('giohang');
			}
		}
		}

		public function deletegiohang(){
			$data['category'] = $this->giohang_model->hienthicategory();
			$this->load->view('giohang',$data,TRUE);
			$this->cart->destroy();
			$this->load->view('giohang');
		}

		// thanh toán
		public function thanhtoan(){
			  $ndata = array(
                'title'          => "Thanh toán",
                );
			  $this->load->view('thanhtoan',$ndata);
		}

		// lưu hóa đơn
		function save_order(){
            $customer = array(
                'hoten'          => $this->input->post('name'),
                'email'         => $this->input->post('email'),
                'dienthoai'         => $this->input->post('phone'),
                'diachi'       => $this->input->post('address'),
                'ngay_tao'          => date('y-m-d')
            );
            $cust_id = $this->giohang_model->insert_thanhtoan($customer);
            
            $order = array(
                'ngay_order' => date('y-m-d'),
                'id_khachhang' => $cust_id,
                'tinhtrang_order' =>'Chưa duyệt',
                'tongtien' =>'0'
            );
            
            $ord_id = $this->giohang_model->insert_order($order);

            
            if ($cart = $this->cart->contents()):
                foreach ($cart as $item):
                    $order_detail = array(
                    'order_id' => $ord_id,
                    'id_sanpham' => $item['id'],
                    'soluong' => $item['qty'],
                    'gia' => $item['price']
                );  
                $cust_id = $this->giohang_model->insert_order_detail($order_detail);
                $this->cart->destroy();
                endforeach;
            endif;
            $this->load->view('thanhcong');	
        }     

	}
 ?>