<?php

class Faq extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->base = $this->config->item('base_url');
		$this->resetcss = $this->config->item('resetcss');
		$this->maincss = $this->config->item('maincss');	

	}
	
	// Danh sách câu hỏi thường gặp
	public function index() {
		
		// Cấu hình phân trang
		$config['base_url'] = 'http://localhost/publicservice/faq/pages/';
		$config['total_rows'] = $this->faq_model->getFaqToPagination();
		$config['per_page'] = 5;
		$config['num_links'] = 20;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);

		$result = $this->faq_model->getFaqLimitFront($config['per_page'], $this->uri->segment(3));
		$data['row'] = $result;
		
		$data['title'] = "Danh sách câu hỏi";        // Lưu tiêu đề
		
		$data['base'] = $this->base;				// Lưu đường dẫn cơ bản, tên của các file css
		$data['resetcss'] = $this->resetcss;
		$data['maincss'] = $this->maincss;					
		
		// Gọi các template
		$this->load->view('templates/header', $data);
		$this->load->view('faq/index', $data);
		$this->load->view('templates/footer', $data);
		
	}
	

}

/* End of file faq.php */
/* Location: ./application/controllers/faq.php */