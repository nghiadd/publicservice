<?php

class Field_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	// Lấy danh sách tất cả lĩnh vực
	public function getAllField() {
		$query = $this->db->get('field');
		return $query->result_array();
	}
	
	// Chọn lĩnh vực theo id
	public function getFieldById($id = 0) {
		$query = $this->db->get_where('field', array('field_id' => $id));
		return $query->row_array();
	}
	
	// Lấy danh sách lĩnh vực được phân quyền cho cán bộ
	public function getFieldByStaff($id = 0) {
		$query = $this->db->get_where('field', array('staff_id' => $id));
		return $query->result_array();
	}
	
	// Lấy danh sách lĩnh vực theo ban ngành
	public function getFieldByAgency($agency_id = 0) {
		$query = $this->db->get_where('field', array('agency_id' => $agency_id));
		return $query->result_array();
	}
	
	// Lấy danh sách lĩnh vực cấp huyện
	public function getFieldByDistrict() {
		$query = $this->db->get_where('field', array('agency_id' => 21));
		return $query->result_array();
	}
	
	// Lấy danh sách lĩnh vực cấp xã
	public function getFieldByVillage() {
		$query = $this->db->get_where('field', array('agency_id' => 22));
		return $query->result_array();		
	}
	
	// Tạo lĩnh vực mới
	public function setField() {
		$field_name = ascii_to_entities($this->input->post('field_name'));
		//$field_name = ascii_to_entities($field_name);
		$data = array(
				'field_name' => $field_name,
				'agency_id' => $this->input->post('agency_id'),
				'staff_id' => $this->input->post('staff_id')				
		);
		return $this->db->insert('field', $data);
	}
	
	// Chỉnh sửa thông tin lĩnh vực
	public function editField($id = 0) {
		$data = array(
				'field_name' => ascii_to_entities($this->input->post('field_name')),
				'agency_id' => $this->input->post('agency_id')
		);
		
		return $this->db->update('field', $data, array('field_id' => $id));		
	}
	
	// Xóa một lĩnh vực
	public function delField($id = 0) {
		return $this->db->delete('field', array('field_id' => $id));	
	}
	
	// Xóa lĩnh vực theo cơ quan
	public function delFieldByAgency($id = 0) {
		return $this->db->delete('field', array('agency_id' => $id));
	}
	
	/********************
	| TRUY XUẤT DỮ LIỆU ĐỂ PHÂN TRANG
	********************/
	
	
	// Lấy tổng hàng để phân trang
	public function getFieldToPagination() {
		$query = $this->db->get('field');
		return $query->num_rows();
	}
	
	// Lẫy dữ liệu để phân trang
	public function getFieldLimit($limit, $offset) {
		$query = $this->db->get('field', $limit, $offset);
		return $query->result_array();
	}
		
}
	
/* End of file field_model.php */
/* Location: ./application/models/field_model.php */