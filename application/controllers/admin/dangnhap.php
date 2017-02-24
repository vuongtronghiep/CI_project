<?php 	
Class dangnhap extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');

		// Load form validation library


		// Load database
		$this->load->model('login_model');
	}

	// Show login page
	public function index() {
	$this->load->view('admin/dangnhap');
	}


	// Check for user login process
	public function login() {

		$this->form_validation->set_rules('tendangnhap', 'Tên Đăng Nhập', 'required|min_length[6]|max_length[25]');
		$this->form_validation->set_rules('matkhau', 'Mật Khẩu', 'required|min_length[6]|max_length[25]');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
			$this->load->view('home');
		}else{
			$this->load->view('admin/dangnhap');
		}
		} else {
		// $data = array(
		//'userName' => $this->input->post('tendangnhap'),
		//'passWord' => $this->input->post('matkhau')
		$tendangnhap = $this->input->post('tendangnhap');
		$matkhau = $this->input->post('matkhau');
		//);
		$result = $this->login_model->login($tendangnhap,$matkhau);
		if ($result == TRUE) {

		$username = $this->input->post('tendangnhap');
		if ($result != false) {
		$session_data = array(
		'userName' => $result[0]->userName,
		'passWord' => $result[0]->passWord,
		);
		 //Add user data in session
			$this->session->set_userdata('logged_in',$session_data);
			redirect("admin/home");
		}
		} else {
		$data = array(
		'error_message' => 'Invalid Username or Password'
		);
		$this->load->view('admin/dangnhap', $data);
		echo "sai tên đăng nhập hoặc mật khẩu";
		}
		}
		}
			public function logout() {

				// Removing session data
				$sess_array = array(
				'username' => ''
				);
				$this->session->unset_userdata('logged_in', $sess_array);
				$data['message_display'] = 'Successfully Logout';
				$this->load->view('admin/dangnhap', $data);
			}
}

?>