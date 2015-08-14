<?php

class Thutuchanhchinh extends CI_Controller {

	var $base;			// Lưu đường dẫn site
	var $resetcss;		// Lưu tên file reset.css
	var $maincss;		// Lưu tên file main.css
	
	public function __construct() {
		parent::__construct();
		$this->base = $this->config->item('base_url');
		$this->resetcss = $this->config->item('resetcss');
		$this->maincss = $this->config->item('maincss');
	}
	
	// Hiển thị danh sách thủ tục hành chính
	public function index() {

		// Cấu hình phân trang
		$config['base_url'] = 'http://localhost/publicservice/thutuchanhchinh/pages/';
		$config['total_rows'] = $this->service_model->getTotalServiceShow();
		$config['per_page'] = 5;
		$config['num_links'] = 20;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);

		$result = $this->service_model->getAllServiceLimit($config['per_page'], $this->uri->segment(3));
		$data['row5'] = $result;
		
		foreach($result as $item) {
			$result2[$item['service_id']] = $this->field_model->getFieldById($item['field_id']);
		}
		$data['row6'] = $result2;
		
		foreach($result as $item) {
			$field_id = $item['field_id'];
			$result3[$item['service_id']] = $this->agency_model->getAgencyByField($field_id);
		}
		$data['row7'] = $result3;
		
		$data['title'] = "Thủ tục hành chính";
		
		$data['base'] = $this->base;
		$data['resetcss'] = $this->resetcss;
		$data['maincss'] = $this->maincss;
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/primary', $data);
		$this->load->view('templates/footer', $data);
	}
	
	// Hàm thao tác lĩnh vực
	public function linhvuc($id = 0) {
	
		// Cấu hình phân trang
		$config['base_url'] = 'http://localhost/publicservice/thutuchanhchinh/linhvuc/'.$id.'/pages/';
		$config['total_rows'] = $this->service_model->getServiceByFieldToPagination($id);
		$config['per_page'] = 5;
		$config['num_links'] = 20;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		$config['uri_segment'] = 5;
		$this->pagination->initialize($config);

		$result = $this->service_model->getServiceByFieldLimit($id, $config['per_page'], $this->uri->segment(5));
		$data['row5'] = $result;	
		
		$result2 = $this->field_model->getFieldById($id);
		$data['row6'] = $result2;
		
		$result3 = $this->agency_model->getAgencyByField($id);
		$data['row7'] = $result3;
		
		$data['title'] = "Danh sách thủ tục";
		
		$data['base'] = $this->base;
		$data['resetcss'] = $this->resetcss;
		$data['maincss'] = $this->maincss;
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('thutuchanhchinh/field_index', $data);
		$this->load->view('templates/footer', $data);		
	}
	
	// Hám hiển thị chi tiết thủ tục
	public function dichvu($slug) {
		$result = $this->service_model->getServiceBySlug($slug);
		$data['row'] = $result;
		
		$result2 = $this->field_model->getFieldById($result['field_id']);
		$data['row2'] = $result2;
	
		$data['title'] = $result['service_name'];
		
		$data['base'] = $this->base;
		$data['resetcss'] = $this->resetcss;
		$data['maincss'] = $this->maincss;
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('thutuchanhchinh/service_detail', $data);
		$this->load->view('templates/footer', $data);				
	}
	
	// Hàm tìm kiếm
	public function timkiem() {
		
		if(isset($_POST['submit']) && !empty($_POST['submit'])) {
			
			if(isset($this->session->userdata['txt_search'])) $this->session->unset_userdata('txt_search');
			
			//$result = $this->service_model->getSearch();
			// Lấy từ khóa tìm kiếm
			$str = ascii_to_entities($this->input->post('txt_search'));
			$str = strtolower($str);
			$this->session->set_userdata('txt_search', $str);
			
		}	
			$str = $this->session->userdata('txt_search');
			// Lấy dữ liệu về tên dịch vụ
			$query = $this->db->get('service');
			$result10 = $query->result_array();
			//echo $result10[3]['service_name'];
			$total = 0;
			
			// Lặp để tìm kiếm qua tất cả các dịch vụ
			foreach($result10 as $item) {
				$str_data = strtolower($item['service_name']);
				if (preg_match('/'.$str.'/', $str_data, $matches)) {
					$result9[$total] =  $item;
					$total += 1;					
				}
			}			
			//echo $result9[1]['service_name'];
			//echo "<br />".$total;
			$data['title'] = "Tìm kiếm thủ tục";
			
			$data['base'] = $this->base;
			$data['resetcss'] = $this->resetcss;
			$data['maincss'] = $this->maincss;	
			
			if($total > 0) {
				
				
				// Cấu hình phân trang
				$config['base_url'] = 'http://localhost/publicservice/thutuchanhchinh/timkiem/pages/';
				$config['total_rows'] = $total;
				$config['per_page'] = 5;
				$config['num_links'] = 20;
				$config['first_link'] = 'First';
				$config['last_link'] = 'Last';
				$config['next_link'] = '&gt;';
				$config['prev_link'] = '&lt;';
				$config['full_tag_open'] = '<div class="pagination">';
				$config['full_tag_close'] = '</div>';
				$config['uri_segment'] = 4;
				$this->pagination->initialize($config);	
				
				$i = $this->uri->segment(4);
				if($i == NULL) $i = 0;
				$for_length = ($total < ($i + $config['per_page']))?$total:($i + $config['per_page']);
				for($i; $i < $for_length; $i++) {
					$result[$i] = $result9[$i];
				}
				$data['row5'] = $result;				
				
				foreach($result as $item) {
					$result2[$item['service_id']] = $this->field_model->getFieldById($item['field_id']);
				}
				$data['row6'] = $result2;
				
				foreach($result as $item) {
					$field_id = $item['field_id'];
					$result3[$item['service_id']] = $this->agency_model->getAgencyByField($field_id);
				}
				$data['row7'] = $result3;
				
				$data['total'] = $total;
				
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('thutuchanhchinh/search', $data);
				$this->load->view('templates/footer', $data);				
				
			} else {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('thutuchanhchinh/search_not', $data);
				$this->load->view('templates/footer', $data);							
			}

		//}
		
	}
}



/* End of file thutuchanhchinh.php */
/* Location: ./application/controllers/thutuchanhchinh.php */