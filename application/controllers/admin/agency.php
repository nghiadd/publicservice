<?php

class Agency extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->base = $this->config->item('base_url');
		$this->resetcss = $this->config->item('resetcss');
		$this->admincss = $this->config->item('admincss');	
		if($this->session->userdata('logged_in') == FALSE) redirect('./admin/login');		// Kiểm tra trạng thái đăng nhập
	}
	
	// Danh mục cơ quan
	public function index() {

		$config['base_url'] = 'http://localhost/publicservice/admin/agency/';
		$config['total_rows'] = $this->agency_model->getAgencyToPagination();
		$config['per_page'] = 10;
		$config['num_links'] = 2;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);	
	
		$result = $this->agency_model->getAgencyLimit($config['per_page'], $this->uri->segment(3));
		$data['row'] = $result;		
	
		$data['title'] = "Cơ quan ban hành";        // Lưu tiêu đề
		
		$data['base'] = $this->base;				// Lưu đường dẫn cơ bản, tên của các file css
		$data['resetcss'] = $this->resetcss;
		$data['admincss'] = $this->admincss;					
		
		// Gọi các template
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/agency/index', $data);
		$this->load->view('admin/templates/footer', $data);
		
	}
	
	// Thêm một cơ quan
	public function create() {
		
		$this->load->helper('text');
		if(isset($_POST['submit']) && !empty($_POST['submit'])) {
		
			$agency_name = $this->input->post('agency_name');
			$agency_name = ascii_to_entities($agency_name);
			$this->agency_model->setAgency($agency_name);
			
			redirect('./admin/agency');
		} else {
		
			$data['title'] = "Thêm cơ quan";		

			$data['base'] = $this->base;				// Lưu đường dẫn cơ bản, tên của các file css
			$data['resetcss'] = $this->resetcss;
			$data['admincss'] = $this->admincss;					
			
			// Gọi các template
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/agency/create', $data);			
			$this->load->view('admin/templates/footer', $data);			

		}
	}
	
	// Sửa tên cơ quan
	public function edit($id = 0) {
		
		$this->load->helper('text');
		
		if(isset($_POST['submit']) && !empty($_POST['submit'])) {
			$agency_name = $this->input->post('agency_name');
			$agency_name = ascii_to_entities($agency_name);
			$this->agency_model->editAgency($id, $agency_name);
			
			redirect('./admin/agency');	
			
		} else {
			$data['title'] = "Thêm cơ quan";		

			$data['base'] = $this->base;				// Lưu đường dẫn cơ bản, tên của các file css
			$data['resetcss'] = $this->resetcss;
			$data['admincss'] = $this->admincss;					
			
			$result = $this->agency_model->getAgencyById($id);
			$data['row'] = $result;			
			
			// Gọi các template
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/agency/edit', $data);			
			$this->load->view('admin/templates/footer', $data);			

		}		
	}
	
	// Xóa cơ quan và các dữ liệu liên quan, bao gồm lĩnh vực, dịch vụ và các văn bản, câu hỏi
	public function delete($id = 0) {
		// Xóa ban ngành
		$this->agency_model->delAgency($id);
		
		$result = $this->field_model->getFieldByAgency($id);

		// Xóa lĩnh vực thuộc ban ngành
		$this->field_model->delFieldByAgency($id);
		
		// Xóa cán bộ thuộc ban ngành
		$this->staff_model->delStaffByagency($id);
		
		// Xóa dịch vụ thuộc ban ngành
		foreach($result as $item) {
			$this->service_model->delServiceByField($item['field_id']);
		}
		
		// Xóa phần hỏi đáp và câu hỏi liên quan đến ban ngành
		
		
		
		redirect('./admin/agency');
	}
	
}

/* End of file agency.php */
/* Location: ./application/controllers/admin/agency.php */