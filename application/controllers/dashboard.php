<?php

class Dashboard extends CI_Controller {

	var $base;			// Lưu đường dẫn site
	var $resetcss;		// Lưu tên file reset.css
	var $maincss;		// Lưu tên file main.css
	
	public function __construct() {
		parent::__construct();
		$this->base = $this->config->item('base_url');
		$this->resetcss = $this->config->item('resetcss');
		$this->maincss = $this->config->item('maincss');
	}
	
	// Hiển thị trang chủ của hệ thống
	public function index() {
	
		$result = $this->service_model->getAllServiceShow();
		$data['row5'] = $result;
		
		$data['title'] = "Trang chủ - Thủ tục hành chính";
		
		$data['base'] = $this->base;
		$data['resetcss'] = $this->resetcss;
		$data['maincss'] = $this->maincss;
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/primary', $data);
		$this->load->view('templates/footer', $data);
	}
	
	
}



/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */