<?php

class Field extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->base = $this->config->item('base_url');
		$this->resetcss = $this->config->item('resetcss');
		$this->admincss = $this->config->item('admincss');	

		if($this->session->userdata('logged_in') == FALSE) redirect('./admin/login');		// Kiểm tra trạng thái đăng nhập		
	}
	
	// Danh sách lĩnh vực
	public function index() {

		$config['base_url'] = 'http://localhost/publicservice/admin/field/';
		$config['total_rows'] = $this->field_model->getFieldToPagination();
		$config['per_page'] = 5;
		$config['num_links'] = 2;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);	
	
		$result = $this->field_model->getFieldLimit($config['per_page'], $this->uri->segment(3));
		$data['row'] = $result;		
	
		foreach($result as $item) {
			$result2[$item['field_id']] = $this->agency_model->getAgencyByField($item['field_id']);
		}
		$data['row2'] = $result2;
		/*
		foreach($result as $item) {
			$result2[$item['agency_id']] = $this->field_model->getFieldByAgency($item['agency_id']);
		}
		
		$data['row2'] = $result2;
		
		$result3 = $this->field_model->getAllField();
		$data['row3'] = $result3;
		*/
		$data['title'] = "Danh sách lĩnh vực";        // Lưu tiêu đề
		
		$data['base'] = $this->base;				// Lưu đường dẫn cơ bản, tên của các file css
		$data['resetcss'] = $this->resetcss;
		$data['admincss'] = $this->admincss;					
		
		// Gọi các template
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/field/index', $data);
		$this->load->view('admin/templates/footer', $data);
		
	}
	
	// Thêm một lĩnh vực
	public function create() {
	
		$this->load->helper('text');
		if(isset($_POST['submit']) && !empty($_POST['submit'])) {

			$this->field_model->setField();
			redirect('./admin/field');
		} else {
			$data['title'] = "Thêm lĩnh vực";		

			$data['base'] = $this->base;				// Lưu đường dẫn cơ bản, tên của các file css
			$data['resetcss'] = $this->resetcss;
			$data['admincss'] = $this->admincss;					
			
			$result2 = $this->agency_model->getAllAgency();
			$data['row2'] = $result2;		
			
			$result3 = $this->staff_model->getAllStaff();
			$data['row3'] = $result3;
			
			// Gọi các template
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/field/create', $data);			
			$this->load->view('admin/templates/footer', $data);			

		}
	}
	
	// Sửa tên cơ quan
	public function edit($id = 0) {
		
		$this->load->helper('text');
		
		if(isset($_POST['submit']) && !empty($_POST['submit'])) {
			$this->field_model->editField($id);
			
			redirect('./admin/field');	
			
		} else {
			$data['title'] = "Sửa thông tin lĩnh vực";		

			$data['base'] = $this->base;				// Lưu đường dẫn cơ bản, tên của các file css
			$data['resetcss'] = $this->resetcss;
			$data['admincss'] = $this->admincss;					
			
			$result = $this->field_model->getFieldById($id);
			$data['row'] = $result;		

			$result2 = $this->staff_model->getStaffByAgency($result['agency_id']);
			$data['row2'] = $result2;
			
			
			// Gọi các template
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/field/edit', $data);			
			$this->load->view('admin/templates/footer', $data);			

		}		
	}
	
	// Xóa cơ quan và các dữ liệu liên quan, bao gồm lĩnh vực, dịch vụ và các văn bản, câu hỏi
	public function delete($id = 0) {
		$this->field_model->delField($id);
		//$this->service_model->delServiceByField($id);
		redirect('./admin/field');
	}
	
}

/* End of file field.php */
/* Location: ./application/controllers/admin/field.php */