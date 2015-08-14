<?php

class Aq_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	// Lấy danh sách tất cả câu hỏi
	public function getAllAq() {
		$query = $this->db->get('aq');
		return $query->result_array();
	}
	
	// Chọn câu hỏi theo id
	public function getAqById($id = 0) {
		$query = $this->db->get_where('aq', array('aq_id' => $id));
		return $query->row_array();
	}
	
	// Lấy danh sách câu hỏi được phân quyền cho cán bộ
	public function getAqByStaff($id = 0) {
		$query = $this->db->get_where('aq', array('staff_id' => $id));
		return $query->result_array();
	}
	
	// Tạo câu hỏi mới
	public function setAq() {
		$service_id = $this->input->post('service_id');
		$result = $this->service_model->getServiceById($service_id);
		$staff_id = $result['staff_id'];
		
		$data = array(
				'aq_name' => ascii_to_entities($this->input->post('aq_name')),
				'service_id' => $service_id,
				'fullname' => ascii_to_entities($this->input->post('fullname')),
				'agency_id' => $this->input->post('agency_id'),
				'status' => 0,
				'staff_id' => $staff_id
		);
		return $this->db->insert('aq', $data);
	}
	
	// Chỉnh sửa thông tin câu hỏi
	public function editAq($id = 0) {
		$data = array(
				'aq_answer' => ascii_to_entities($this->input->post('aq_answer')),
				'status' => $this->input->post('status')
		);
		
		return $this->db->update('aq', $data, array('aq_id' => $id));		
	}
	
	// Xóa một câu hỏi
	public function delAq($id = 0) {
		return $this->db->delete('aq', array('aq_id' => $id));	
	}
	
	/********************
	| TRUY XUẤT DỮ LIỆU ĐỂ PHÂN TRANG
	********************/

	// Lấy tổng hàng
	public function getAqToPagination() {
		$query = $this->db->get_where('aq', array('status' => 1));
		return $query->num_rows();
	}
	
	// Lấy danh sách câu hỏi theo từng trang
	public function getAqLimitFront($limit, $offset) {
		$query = $this->db->get_where('aq', array('status' => 1), $limit, $offset);
		return $query->result_array();
	}
	
}
	
/* End of file aq_model.php */
/* Location: ./application/models/aq_model.php */