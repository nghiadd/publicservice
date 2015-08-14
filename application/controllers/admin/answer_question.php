<?php

class Answer_question extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->base = $this->config->item('base_url');
		$this->resetcss = $this->config->item('resetcss');
		$this->admincss = $this->config->item('admincss');	

		if($this->session->userdata('logged_in') == FALSE) redirect('./admin/login');		// Kiểm tra trạng thái đăng nhập		
	}
	
	// Danh sách câu hỏi
	public function index() {

		$result = $this->aq_model->getAqByStaff($this->session->userdata('staff_id'));
		$data['row'] = $result;
	
		$data['title'] = "Danh sách câu hỏi";        // Lưu tiêu đề
		
		$data['base'] = $this->base;				// Lưu đường dẫn cơ bản, tên của các file css
		$data['resetcss'] = $this->resetcss;
		$data['admincss'] = $this->admincss;					
		
		// Gọi các template
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/answer_question/index', $data);
		$this->load->view('admin/templates/footer', $data);
		
	}
	
	// Trả lời câu hỏi
	public function answer($id = 0) {
		// Cấu hình cho Ckeditor
		$this->load->library('ckeditor');
		$this->ckeditor->basePath = $this->base.'assets/ckeditor/';
		$this->ckeditor->config['toolbar'] = array(
				array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList' )
													);
		$this->ckeditor->config['language'] = 'it';
		$this->ckeditor->config['width'] = '730px';
		$this->ckeditor->config['height'] = '300px';    		
	
		if(isset($_POST['submit']) && !empty($_POST['submit'])) {

			$this->aq_model->editAq($id);
			redirect('./admin/answer_question');
		} else {
			$data['title'] = "Trả lời câu hỏi";		

			$data['base'] = $this->base;				// Lưu đường dẫn cơ bản, tên của các file css
			$data['resetcss'] = $this->resetcss;
			$data['admincss'] = $this->admincss;					
			
			$result = $this->aq_model->getAqById($id);
			$data['row'] = $result;
			
			// Gọi các template
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/answer_question/answer', $data);			
			$this->load->view('admin/templates/footer', $data);			

		}
	}
	
	// Sửa tên cơ quan
	public function edit($id = 0) {
		// Cấu hình cho Ckeditor
		$this->load->library('ckeditor');
		$this->ckeditor->basePath = $this->base.'assets/ckeditor/';
		$this->ckeditor->config['toolbar'] = array(
				array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList' )
													);
		$this->ckeditor->config['language'] = 'it';
		$this->ckeditor->config['width'] = '730px';
		$this->ckeditor->config['height'] = '300px';    		
	
		if(isset($_POST['submit']) && !empty($_POST['submit'])) {
			$this->aq_model->editAq($id);
			
			redirect('./admin/answer_question');	
			
		} else {
			$data['title'] = "Sửa câu hỏi";		

			$data['base'] = $this->base;				// Lưu đường dẫn cơ bản, tên của các file css
			$data['resetcss'] = $this->resetcss;
			$data['admincss'] = $this->admincss;					
			
			$result = $this->aq_model->getAqById($id);
			$data['row'] = $result;		

			// Gọi các template
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/answer_question/edit', $data);			
			$this->load->view('admin/templates/footer', $data);			

		}		
	}
	
	// Xóa câu hỏi
	public function delete($id = 0) {
		$this->aq_model->delAq($id);
		//$this->service_model->delServiceByAnswer_question($id);
		redirect('./admin/answer_question');
	}
	
}

/* End of file answer_question.php */
/* Location: ./application/controllers/admin/answer_question.php */