<?php

class Staff extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->base = $this->config->item('base_url');
		$this->resetcss = $this->config->item('resetcss');
		$this->admincss = $this->config->item('admincss');	

		if($this->session->userdata('logged_in') == FALSE) redirect('./admin/login');		// Kiểm tra trạng thái đăng nhập		
	}
	
	// Danh mục cán bộ
	public function index() {

		$config['base_url'] = 'http://localhost/publicservice/admin/staff/';
		$config['total_rows'] = $this->staff_model->getStaffToPagination();
		$config['per_page'] = 10;
		$config['num_links'] = 2;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);	
	
		$result = $this->staff_model->getStaffLimit($config['per_page'], $this->uri->segment(3));
		$data['row'] = $result;	
		
		foreach($result as $item) {
			$result2[$item['staff_id']] = $this->agency_model->getAgencyById($item['agency_id']);
		}
		$data['row2'] = $result2;
		
		$result3 = $this->agency_model->getAllAgency();
		$data['row3'] = $result3;
		
		foreach($result3 as $item) {
			$result4[$item['agency_id']] = $this->staff_model->getStaffByAgency($item['agency_id']);
		}
		$data['row4'] = $result4;
		
		$data['title'] = "Danh sách cán bộ";        // Lưu tiêu đề
		
		$data['base'] = $this->base;				// Lưu đường dẫn cơ bản, tên của các file css
		$data['resetcss'] = $this->resetcss;
		$data['admincss'] = $this->admincss;					
		
		// Gọi các template
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/staff/index', $data);
		$this->load->view('admin/templates/footer', $data);
		
	}
	
	// Thêm một cán bộ
	public function create() {
	
		$this->load->helper('text');
		if(isset($_POST['submit']) && !empty($_POST['submit'])) {

			$this->staff_model->setStaff();
			echo $this->input->post('birthday');
			redirect('./admin/staff');
		} else {
			$data['title'] = "Thêm cán bộ";		

			$data['base'] = $this->base;				// Lưu đường dẫn cơ bản, tên của các file css
			$data['resetcss'] = $this->resetcss;
			$data['admincss'] = $this->admincss;					
			
			$result2 = $this->agency_model->getAllAgency();
			$data['row2'] = $result2;			
			
			// Gọi các template
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/staff/create', $data);			
			$this->load->view('admin/templates/footer', $data);			

		}
	}
	
	// Sửa tên cơ quan
	public function edit($id = 0) {
		
		$this->load->helper('text');
		
		if(isset($_POST['submit']) && !empty($_POST['submit'])) {
			$this->staff_model->editStaff($id);
			
			echo $this->input->post('birthday');
			redirect('./admin/staff');	
			
		} else {
			$data['title'] = "Sửa thông tin cán bộ";		

			$data['base'] = $this->base;				// Lưu đường dẫn cơ bản, tên của các file css
			$data['resetcss'] = $this->resetcss;
			$data['admincss'] = $this->admincss;					
			
			$result = $this->staff_model->getStaffById($id);
			$data['row'] = $result;		

			$result2 = $this->agency_model->getAllAgency();
			$data['row2'] = $result2;
			
			// Gọi các template
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/staff/edit', $data);			
			$this->load->view('admin/templates/footer', $data);			

		}		
	}
	
	// Xóa cơ quan và các dữ liệu liên quan, bao gồm lĩnh vực, dịch vụ và các văn bản, câu hỏi
	public function delete($id = 0) {
		$this->staff_model->delStaff($id);
		redirect('./admin/staff');
	}
	
	
}

/* End of file staff.php */
/* Location: ./application/controllers/admin/staff.php */