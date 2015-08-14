<?php

class Staff_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	// Lấy danh sách tất cả cán bộ
	public function getAllStaff() {
		$query = $this->db->get_where('staff', array('staff_group_id' => 3));
		return $query->result_array();
	}

	// Chọn cán bộ theo id
	public function getStaffById($id = 0) {
		$query = $this->db->get_where('staff', array('staff_id' => $id));
		return $query->row_array();
	}
	
	// Chọn cán bộ theo username
	public function getStaffByUsername($username) {
		$query = $this->db->get_where('staff', array('username' => $username));
		return $query->row_array();
	}
	
	// Hàm kiểm tra username và password khi đăng nhập
	public function loginCheck($username, $password) {
		$query = $this->db->get_where('staff', array('username' => $username, 'password' => $password));
		if($query->num_rows() > 0) return TRUE;
		return FALSE;
	}
	
	// Lấy danh sách cán bộ theo ban ngành
	public function getStaffByAgency($agency_id = 0) {
		$query = $this->db->get_where('staff', array('agency_id' => $agency_id, 'staff_group_id' => 3));
		return $query->result_array();
	}
	
	// Tạo thông tin cán bộ mới
	public function setStaff() {
		$fullname = ascii_to_entities($this->input->post('fullname'));
		//$fullname = ascii_to_entities($fullname);
		$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'fullname' => $fullname,
				'birthday' => $this->input->post('birthday'),
				'agency_id' => $this->input->post('agency_id'),
				'staff_group_id' => 3
		);
		return $this->db->insert('staff', $data);
	}
	
	// Chỉnh sửa thông tin cán bộ
	public function editStaff($id = 0) {
		$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'fullname' => ascii_to_entities($this->input->post('fullname')),
				'birthday' => $this->input->post('birthday'),
				'agency_id' => $this->input->post('agency_id')
		);
		
		return $this->db->update('staff', $data, array('staff_id' => $id));		
	}
	
	// Xóa một cán bộ
	public function delStaff($id = 0) {
		return $this->db->delete('staff', array('staff_id' => $id));	
	}
	
	// Xóa cán bộ theo ban ngành
	public function delStaffByAgency($id = 0) {
		return $this->db->delete('staff', array('agency_id' => $id));
	}
	
	
	// Đổi mật khẩu
	public function changepass($staff_id) {
		$data = array(
				'password' => $this->input->post('password')
		);
		
		return $this->db->update('staff', $data, array('staff_id' => $staff_id));
	}
	
	/********************
	| TRUY XUẤT DỮ LIỆU ĐỂ PHÂN TRANG
	********************/
	
	
	// Lấy tổng hàng để phân trang
	public function getStaffToPagination() {
		$query = $this->db->get_where('staff', array('staff_group_id' => 3));
		return $query->num_rows();
	}
	
	// Lẫy dữ liệu để phân trang
	public function getStaffLimit($limit, $offset) {
		$query = $this->db->get_where('staff', array('staff_group_id' => 3), $limit, $offset);
		return $query->result_array();
	}
	
	
}
	
/* End of file staff_model.php */
/* Location: ./application/models/staff_model.php */