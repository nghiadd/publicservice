<?php

class Service_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	// Lấy danh sách tất cả dịch vụ
	public function getAllService() {
		$query = $this->db->get('service');
		return $query->result_array();
	}
	
	// Chọn dịch vụ theo id
	public function getServiceById($id = 0) {
		$query = $this->db->get_where('service', array('service_id' => $id));
		return $query->row_array();
	}
	
	// Lấy danh sách dịch vụ theo lĩnh vực
	public function getServiceByField($field_id = 0) {
		$query = $this->db->get_where('service', array('field_id' => $field_id));
		return $query->result_array();
	}
	
	// Lấy danh sách dịch vụ cho phép hiển thị
	public function getAllServiceShow() {
		$query = $this->db->get_where('service', array('status' => 1));
		return $query->result_array();
	}
	
	// Lấy danh sách dịch vụ theo lĩnh vực ( status = 1 ) cho phép hiển thị
	public function getServiceByFieldShow($field_id = 0) {
		$query = $this->db->get_where('service', array('field_id' => $field_id, 'status' => 1));
		return $query->result_array();
	}
	
	// Lấy dịch vụ theo slug
	public function getServiceBySlug($slug) {
		$query = $this->db->get_where('service', array('slug' => $slug));
		return $query->row_array();
	}
	
	// Lấy danh sách dịch vụ theo cán bộ
	public function getServiceByStaff($staff_id = 0) {
		$query = $this->db->get_where('service', array('staff_id' => $staff_id));
		return $query->result_array();
	}
	
	// Lấy danh sách dịch vụ theo ban ngành
	public function getServiceByAgency($id = 0) {
		$result = $this->field_model->getFieldByAgency($id);
	}
	
	// Tạo dịch vụ mới
	public function setService() {
	
		// Xử lý upload
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'doc';
		$config['max_size']	= '1000';
		$this->load->library('upload', $config);
		
		$this->upload->do_upload('donmau_link');
		
		// Xử lý dấu tiếng việt cho đường link
		
		$data = array(
				'service_name' => ascii_to_entities($this->input->post('service_name')),
				'status' => $this->input->post('status'),
				'online' => $this->input->post('online'),
				'coquan' => ascii_to_entities($this->input->post('coquan')),
				'trinhtu' => ascii_to_entities($this->input->post('trinhtu')),
				'cachthuc' => ascii_to_entities($this->input->post('cachthuc')),
				'doituong' => ascii_to_entities($this->input->post('doituong')),
				'thoihan' => ascii_to_entities($this->input->post('thoihan')),
				'lephi' => ascii_to_entities($this->input->post('lephi')),
				'ketqua' => ascii_to_entities($this->input->post('ketqua')),
				'donmau' => ascii_to_entities($this->input->post('donmau')),
				'donmau_link' => $this->upload->data()['file_name'],
				'profile' => ascii_to_entities($this->input->post('profile')),
				'profile_quantity' => ascii_to_entities($this->input->post('profile_quantity')),
				'yeucau' => ascii_to_entities($this->input->post('yeucau')),
				'cancuphaply' => ascii_to_entities($this->input->post('cancuphaply')),
				'slug' => $slug = mb_strtolower(url_title(removesign($this->input->post('service_name')))),
				'field_id' => $this->input->post('field_id'),
				'staff_id' => $this->session->userdata('staff_id')
		);
		return $this->db->insert('service', $data);
	}
	
	// Chỉnh sửa thông tin dịch vụ
	public function editService($id = 0) {
		
		// Xử lý dấu tiếng việt cho đường link
		$slug = $this->input->post('service_name');
		$slug = mb_strtolower(url_title(removesign($slug)));
		
		$data = array(
				'service_name' => ascii_to_entities($this->input->post('service_name')),
				'status' => $this->input->post('status'),
				'online' => $this->input->post('online'),
				'coquan' => ascii_to_entities($this->input->post('coquan')),
				'trinhtu' => ascii_to_entities($this->input->post('trinhtu')),
				'cachthuc' => ascii_to_entities($this->input->post('cachthuc')),
				'doituong' => ascii_to_entities($this->input->post('doituong')),
				'thoihan' => ascii_to_entities($this->input->post('thoihan')),
				'lephi' => ascii_to_entities($this->input->post('lephi')),
				'ketqua' => ascii_to_entities($this->input->post('ketqua')),
				'donmau' => ascii_to_entities($this->input->post('donmau')),
				'profile' => ascii_to_entities($this->input->post('profile')),
				'profile_quantity' => ascii_to_entities($this->input->post('profile_quantity')),
				'yeucau' => ascii_to_entities($this->input->post('yeucau')),
				'cancuphaply' => ascii_to_entities($this->input->post('cancuphaply')),
				'slug' => $slug,
				'field_id' => $this->input->post('field_id'),
				'staff_id' => $this->session->userdata('staff_id')
		);
		
		return $this->db->update('service', $data, array('service_id' => $id));		
	}
	
	// Xóa một dịch vụ
	public function delService($id = 0) {
		$query = $this->db->get_where('service', array('service_id' => $id));
		$result = $query->row_array();
		
		$path = '../uploads/'.$result['donmau_link'];
		unlink($path);
		$this->db->delete('service', array('service_id' => $id));	
		
	}
	
	// Xóa dịch vụ theo lĩnh vực
	public function delServiceByField($id = 0) {
		return $this->db->delete('service', array('field_id' => $id));
	}
	
	/**************************************************************
	|	TÌM KIẾM
	***************************************************************/
	/*
	public function getSearch() {
		// Lấy từ khóa tìm kiếm
		$str = ascii_to_entities($this->input->post('txt_search'));
		$str = strtolower($str);
		
		// Lấy dữ liệu về tên dịch vụ
		$query = $this->db->get('service');
		$result = $query->result_array();
		
		// Lặp để tìm kiếm qua tất cả các dịch vụ
		foreach($result as $item) {
			$str_data = strtolower($item['service_name']);
			if (preg_match('/'.$str.'/', $str_data, $matches)) {
				$data $item['service_id'];
			}
		}
		
	}
	*/
	
	/********************
	| TRUY XUẤT DỮ LIỆU ĐỂ PHÂN TRANG
	********************/
	
	/*
		PHÂN TRANG THEO LĨNH VỰC
	*/
	// Lấy tổng hàng để phân trang
	public function getServiceByFieldToPagination($id) {
		$query = $this->db->get_where('service', array('field_id' => $id, 'status' => 1));
		return $query->num_rows();
	}
	
	// Lẫy dữ liệu để phân trang
	public function getServiceByFieldLimit($field_id, $limit, $offset) {
		$query = $this->db->get_where('service', array('field_id' => $field_id, 'status' => 1), $limit, $offset);
		return $query->result_array();
	}
	
	/*
		PHÂN TRANG THEO TOÀN BỘ BAN NGÀNH
	*/
	
	// Lấy tổng hàng để phân trang
	public function getTotalServiceShow() {
		$query = $this->db->get_where('service', array('status' => 1));
		return $query->num_rows();
	}
	
	// Lấy dữ liệu để phân trang
	public function getAllServiceLimit($limit, $offset) {
		$query = $this->db->get_where('service', array('status' => 1), $limit, $offset);
		return $query->result_array();
	}
	
	
}
	
/* End of file service_model.php */
/* Location: ./application/models/service_model.php */