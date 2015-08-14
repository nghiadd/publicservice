<?php

class Dashboard extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->base = $this->config->item('base_url');
		$this->resetcss = $this->config->item('resetcss');
		$this->admincss = $this->config->item('admincss');	

	}
	
	public function index() {
		if($this->session->userdata('logged_in') == FALSE) redirect('./admin/login');		// Kiểm tra trạng thái đăng nhập					
		
		$data['title'] = "Trang quản trị"; // Lưu tiêu đề
		
		$data['base'] = $this->base;				/* Lưu đường dẫn cơ bản, tên của các file css */
		$data['resetcss'] = $this->resetcss;
		$data['admincss'] = $this->admincss;			
		
		// Gọi các template
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/primary', $data);
		$this->load->view('admin/templates/footer', $data);
		
	}
	
	// Hàm xử lý đăng nhập
	public function login() {
		if($this->session->userdata('logged_in') == TRUE) {
		
			/* 
			|  Kiểm tra, nếu đã đăng nhập rồi thì không được phép vào trang đăng nhập nữa
			|  Mọi truy cập vào trang này đều được điều hướng đến trang admin
			*/
			redirect('./admin');
			
		}
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = 'Đăng nhập';
		
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		
		if($this->form_validation->run() === FALSE) {
		
			$this->load->view('admin/login');			
			
		} else {
		
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$result = $this->staff_model->loginCheck($username, $password);
			$result2 = $this->staff_model->getStaffByUsername($username);
			if($result == TRUE) {

				$this->session->set_userdata('logged_in', TRUE);
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('staff_id', $result2['staff_id']);
				$this->session->set_userdata('staff_group_id', $result2['staff_group_id']);
				redirect('./admin');
				
			} else {
				$data['error'] = 'Sai tên đăng nhập hoặc mật khẩu. Mời nhập lại.';							
				$this->load->view('admin/login', $data);
			
			}
		}
	}
	
	
	// Hàm xử lý đăng xuất
	public function logout() {
		$this->session->sess_destroy();
		redirect('./admin');
	}
	
	// Đổi mật khẩu
	public function changepass() {
		if($this->session->userdata('logged_in') == FALSE) redirect('./admin/login');		// Kiểm tra trạng thái đăng nhập

		if(isset($_POST['submit']) && !empty($_POST['submit'])) {
			$this->staff_model->changepass($this->session->userdata('staff_id'));
			redirect('./admin');
		} else {
			$data['title'] = "Đổi mật khẩu";
			
			$data['base'] = $this->base;				// Lưu đường dẫn cơ bản, tên của các file css
			$data['resetcss'] = $this->resetcss;
			$data['admincss'] = $this->admincss;								
			
			// Gọi các template
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/changepass', $data);
			$this->load->view('admin/templates/footer', $data);
			
		}
	}
	
	
}



/* End of file administrator.php */
/* Location: ./application/controllers/administrator/administrator.php */