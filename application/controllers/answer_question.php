<?php

class Answer_question extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->base = $this->config->item('base_url');
		$this->resetcss = $this->config->item('resetcss');
		$this->maincss = $this->config->item('maincss');	

	}
	
	// Danh sách câu hỏi
	public function index() {
	
		// Cấu hình phân trang
		$config['base_url'] = 'http://localhost/publicservice/answer_question/pages/';
		$config['total_rows'] = $this->aq_model->getAqToPagination();
		$config['per_page'] = 5;
		$config['num_links'] = 20;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);

		$result = $this->aq_model->getAqLimitFront($config['per_page'], $this->uri->segment(3));
		$data['row'] = $result;		
		
		$data['title'] = "Hỏi đáp";        // Lưu tiêu đề
		
		$data['base'] = $this->base;				// Lưu đường dẫn cơ bản, tên của các file css
		$data['resetcss'] = $this->resetcss;
		$data['maincss'] = $this->maincss;					
		
		// Gọi các template
		$this->load->view('templates/header', $data);
		$this->load->view('answer_question/index', $data);
		$this->load->view('templates/footer', $data);
		
	}
	
	public function create() {
		
		if(isset($_POST['submit']) && !empty($_POST['submit'])) {

			$this->aq_model->setAq();
			redirect('./answer_question');
		} else {
			
			$result = $this->agency_model->getAllAgency();
			$data['row'] = $result;
			
			$data['title'] = "Gửi câu hỏi";        // Lưu tiêu đề
			
			$data['base'] = $this->base;				// Lưu đường dẫn cơ bản, tên của các file css
			$data['resetcss'] = $this->resetcss;
			$data['maincss'] = $this->maincss;							
			
			// Gọi các template
			$this->load->view('templates/header', $data);
			$this->load->view('answer_question/create', $data);
			$this->load->view('templates/footer', $data);
		
		}		
		

		
	}

}

/* End of file answer_question.php */
/* Location: ./application/controllers/answer_question.php */