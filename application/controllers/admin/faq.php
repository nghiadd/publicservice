<?php

class Faq extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->base = $this->config->item('base_url');
		$this->resetcss = $this->config->item('resetcss');
		$this->admincss = $this->config->item('admincss');	

		if($this->session->userdata('logged_in') == FALSE) redirect('./admin/login');		// Kiểm tra trạng thái đăng nhập		
	}
	
	// Danh sách câu hỏi thường gặp
	public function index() {
	
		// Cấu hình phân trang
		$config['base_url'] = 'http://localhost/publicservice/admin/faq/';
		$config['total_rows'] = $this->faq_model->getFaqByStaffToPagination($this->session->userdata('staff_id'));
		$config['per_page'] = 5;
		$config['num_links'] = 2;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);


		$result3 = $this->faq_model->getFaqLimit($this->session->userdata('staff_id'), $config['per_page'], $this->uri->segment(3));
		$data['row3'] = $result3;
		
		if($result3 != NULL) {
			foreach($result3 as $item) {
				$result2[$item['service_id']] = $this->service_model->getServiceById($item['service_id']);
			}
			$data['row2'] = $result2;			
		}
		$data['title'] = "Danh sách câu hỏi thường gặp";        // Lưu tiêu đề
		
		$data['base'] = $this->base;				// Lưu đường dẫn cơ bản, tên của các file css
		$data['resetcss'] = $this->resetcss;
		$data['admincss'] = $this->admincss;					
		
		// Gọi các template
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/faq/index', $data);
		$this->load->view('admin/templates/footer', $data);
		
	}
	
	// Phân trang
	public function page() {
		
	}
	
	// Tạo câu hỏi thường gặp
	public function create() {
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

			$this->faq_model->setFaq();
			redirect('./admin/faq');
		} else {
			$data['title'] = "Thêm lĩnh vực";		

			$data['base'] = $this->base;				// Lưu đường dẫn cơ bản, tên của các file css
			$data['resetcss'] = $this->resetcss;
			$data['admincss'] = $this->admincss;					
			
			$result = $this->service_model->getServiceByStaff($this->session->userdata('staff_id'));
			$data['row'] = $result;
			
			// Gọi các template
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/faq/create', $data);			
			$this->load->view('admin/templates/footer', $data);			

		}
	}
	
	// Sửa câu hỏi thường gặp
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
			$this->faq_model->editFaq($id);
			
			redirect('./admin/faq');	
			
		} else {
			$data['title'] = "Sửa thông tin câu hỏi thường gặp";		

			$data['base'] = $this->base;				// Lưu đường dẫn cơ bản, tên của các file css
			$data['resetcss'] = $this->resetcss;
			$data['admincss'] = $this->admincss;					
			
			$result = $this->faq_model->getFaqById($id);
			$data['row'] = $result;		

			// Gọi các template
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/faq/edit', $data);			
			$this->load->view('admin/templates/footer', $data);			

		}		
	}
	
	// Xóa câu hỏi thường gặp
	public function delete($id = 0) {

		// Xóa câu hỏi thường gặp
		$this->faq_model->delFaq($id);
		redirect('./admin/faq');
	}
	
}

/* End of file faq.php */
/* Location: ./application/controllers/admin/faq.php */