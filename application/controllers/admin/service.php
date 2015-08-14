<?php

class Service extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->base = $this->config->item('base_url');
		$this->resetcss = $this->config->item('resetcss');
		$this->admincss = $this->config->item('admincss');	

		if($this->session->userdata('logged_in') == FALSE) redirect('./admin/login');		// Kiểm tra trạng thái đăng nhập		
	}
	
	// Danh sách dịch vụ
	public function index() {

		$result = $this->service_model->getServiceByStaff($this->session->userdata('staff_id'));
		$data['row'] = $result;
		//var_dump($result);
		if($result != NULL) {
			foreach($result as $item) {
				$result2[$item['field_id']] = $this->field_model->getFieldById($item['field_id']);
			}
			$data['row2'] = $result2;	
		}
		
		$data['title'] = "Danh sách dịch vụ";        // Lưu tiêu đề
		
		$data['base'] = $this->base;				// Lưu đường dẫn cơ bản, tên của các file css
		$data['resetcss'] = $this->resetcss;
		$data['admincss'] = $this->admincss;					
		
		// Gọi các template
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/service/index', $data);
		$this->load->view('admin/templates/footer', $data);
		
	}
	
	// Thêm một lĩnh vực
	public function create() {
		$this->load->library('ckeditor');
		$this->ckeditor->basePath = $this->base.'assets/ckeditor/';
		$this->ckeditor->config['toolbar'] = array(
                array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList' )
                                                    );
		$this->ckeditor->config['language'] = 'it';
		$this->ckeditor->config['width'] = '730px';
		$this->ckeditor->config['height'] = '300px';     		
		
		if(isset($_POST['submit']) && !empty($_POST['submit'])) {

			$this->service_model->setService();
			redirect('./admin/service');
		} else {
			$data['title'] = "Thêm lĩnh vực";		

			$data['base'] = $this->base;				// Lưu đường dẫn cơ bản, tên của các file css
			$data['resetcss'] = $this->resetcss;
			$data['admincss'] = $this->admincss;					
			
			$result = $this->field_model->getFieldByStaff($this->session->userdata('staff_id'));
			$data['row'] = $result;
			
			// Gọi các template
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/service/create', $data);			
			$this->load->view('admin/templates/footer', $data);			

		}
	}
	
	// Sửa dịch vụ
	public function edit($id = 0) {
		
		if(isset($_POST['submit']) && !empty($_POST['submit'])) {
			$this->service_model->editService($id);
			
			redirect('./admin/service');	
			
		} else {
			$this->load->library('ckeditor');
			$this->ckeditor->basePath = $this->base.'assets/ckeditor/';
			$this->ckeditor->config['toolbar'] = array(
					array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList' )
														);
			$this->ckeditor->config['language'] = 'it';
			$this->ckeditor->config['width'] = '730px';
			$this->ckeditor->config['height'] = '300px';    		
			$data['title'] = "Sửa thông tin lĩnh vực";		

			$data['base'] = $this->base;				// Lưu đường dẫn cơ bản, tên của các file css
			$data['resetcss'] = $this->resetcss;
			$data['admincss'] = $this->admincss;					
			
			$result = $this->service_model->getServiceById($id);
			$data['row'] = $result;		

			$result2 = $this->field_model->getFieldByStaff($result['staff_id']);
			$data['row2'] = $result2;
			
			
			// Gọi các template
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/service/edit', $data);			
			$this->load->view('admin/templates/footer', $data);			

		}		
	}
	
	// Xóa dịch vụ và các văn bản, câu hỏi liên quan
	public function delete($id = 0) {
		// Xóa file đính kèm
		$result = $this->service_model->getServiceById($id);
		$path = './uploads/'.$result['donmau_link'];
		unlink($path);
		
		// Xóa dịch vụ
		$this->service_model->delService($id);
		redirect('./admin/service');
	}
	
}

/* End of file service.php */
/* Location: ./application/controllers/admin/service.php */