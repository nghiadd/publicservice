<?php

class Faq_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	// Lấy danh sách tất cả faq
	public function getAllFaq() {
		$query = $this->db->get('faq');
		return $query->result_array();
	}
	
	// Chọn faq theo id
	public function getFaqById($id = 0) {
		$query = $this->db->get_where('faq', array('faq_id' => $id));
		return $query->row_array();
	}
	
	// Lấy danh sách faq được phân quyền cho cán bộ
	public function getFaqByStaff($id = 0) {
		$query = $this->db->get_where('faq', array('staff_id' => $id));
		return $query->result_array();
	}
		
	// Tạo faq mới
	public function setFaq() {
		$data = array(
				'faq_name' => ascii_to_entities($this->input->post('faq_name')),
				'faq_answer' => ascii_to_entities($this->input->post('faq_answer')),
				'service_id' => $this->input->post('service_id'),
				'staff_id' => $this->input->post('staff_id')				
		);
		return $this->db->insert('faq', $data);
	}
	
	// Chỉnh sửa thông tin faq
	public function editFaq($id = 0) {
		$data = array(
				'faq_name' => ascii_to_entities($this->input->post('faq_name')),
				'faq_answer' => ascii_to_entities($this->input->post('faq_answer')),
		);
		
		return $this->db->update('faq', $data, array('faq_id' => $id));		
	}
	
	// Xóa một faq
	public function delFaq($id = 0) {
		return $this->db->delete('faq', array('faq_id' => $id));	
	}
	
	// Xóa faq theo cơ quan
	public function delFaqByAgency($id = 0) {
		return $this->db->delete('faq', array('agency_id' => $id));
	}

	/****************************
	| PHÂN TRANG CHO PHẦN ADMIN
	****************************/
	
	// Lấy tổng hàng để phân trang
	public function getFaqByStaffToPagination($id = 0) {
		$query = $this->db->get_where('faq', array('staff_id' => $id));
		return $query->num_rows();
	}	
	
	// Lấy dữ liệu để phân trang
	public function getFaqLimit($staff_id, $limit, $offset) {
		$query = $this->db->get_where('faq', array('staff_id' => $staff_id), $limit, $offset);
		return $query->result_array();
	}	
	
	/****************************
	| PHÂN TRANG CHO TRANG CHỦ
	****************************/	
	
	// Lấy tổng hàng
	public function getFaqToPagination() {
		$query = $this->db->get('faq');
		return $query->num_rows();
	}
	
	// Lấy danh sách faq theo từng trang
	public function getFaqLimitFront($limit, $offset) {
		$query = $this->db->get('faq', $limit, $offset);
		return $query->result_array();
	}
}
	
/* End of file faq_model.php */
/* Location: ./application/models/faq_model.php */