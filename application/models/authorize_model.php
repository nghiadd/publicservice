<?php

class Authorize_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	// Lấy danh sách tất cả lĩnh vực
	public function getAllAuthorize() {
		$query = $this->db->get('staff_field');
		return $query->result_array();
	}
	
	// Lấy thông tin phân quyền theo lĩnh vực
	public function getAuthorizeById($id = 0) {
		$query = $this->db->get_where('staff_field', array('staff_field_id' => $id));
		return $query->row_array();
	}
	
	// Lấy thông tin phân quyền theo ban ngành
	public function getAuthorizeByAgency($agency_id = 0) {
		$query = $this->db->get_where('staff_field', array('agency_id' => $agency_id));
		return $query->result_array();
	}
	
	// Tạo phân quyền mới
	public function setAuthorize($staff_id, $field_id) {
		$field_id = $this->input->post('field_name');
		$data = array(
				'staff_id' => $staff_id,
				'field_id' => $field_id
		);
		return $this->db->insert('staff_field', $data);
	}
	
	// Chỉnh sửa thông tin phân quyền
	public function editAuthorize($id = 0, $staff_id, $field_id) {
		$data = array(
				'staff_id' => $staff_id,
				'field_id' => $field_id
		);
		
		return $this->db->update('staff_field', $data, array('staff_field_id' => $id));		
	}
	
	// Bỏ phân quyền
	public function delAuthorize($id = 0) {
		return $this->db->delete('staff_field', array('staff_field_id' => $id));	
	}
	
}
	
/* End of file authorize_model.php */
/* Location: ./application/models/authorize_model.php */