<?php

class Agency_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	// Lấy tên tất cả ban ngành
	public function getAllAgency() {
		$query = $this->db->get('agency');
		return $query->result_array();
	}
	
	// Lấy danh sách sở ban ngành
	public function getAgencyByField($id = 0) {
		$query = $this->db->get_where('field', array('field_id' => $id));
		$result = $query->row_array();
		$query2 = $this->db->get_where('agency', array('agency_id' => $result['agency_id']));
		return $query2->row_array();
	}
	
	// Lấy tên ban ngành theo id
	public function getAgencyById($id = 0) {
		$query = $this->db->get_where('agency', array('agency_id' => $id));
		return $query->row_array();
	}
	
	// Thêm một ban ngành
	public function setAgency($agency_name) {

		$data = array(
				'agency_name' => $agency_name
		);
		
		return $this->db->insert('agency', $data); 
		
	}
	
	// Chỉnh sửa một ban ngành
	public function editAgency($id = 0, $agency_name) {
		$data = array(
				'agency_name' => $agency_name
		);
		
		return $this->db->update('agency', $data, array('agency_id' => $id));
	}
	
	// Xóa một ban ngành
	public function delAgency($id = 0) {
		$this->db->delete('staff', array('agency_id' => $id));
		return $this->db->delete('agency', array('agency_id' => $id));
	}	

	/********************
	| TRUY XUẤT DỮ LIỆU ĐỂ PHÂN TRANG
	********************/
	
	
	// Lấy tổng hàng để phân trang
	public function getAgencyToPagination() {
		$query = $this->db->get_where('agency');
		return $query->num_rows();
	}
	
	// Lẫy dữ liệu để phân trang
	public function getAgencyLimit($limit, $offset) {
		$query = $this->db->get('agency', $limit, $offset);
		return $query->result_array();
	}	
	
}

/* End of file agency_model.php */
/* Location: ./application/models/agency_model.php */