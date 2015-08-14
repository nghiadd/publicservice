<?php

class Process extends CI_Controller {
	public function __construct() {
		parent::__construct();
		error_reporting(E_ALL ^ (E_NOTICE));
		if($this->session->userdata('logged_in') == FALSE) redirect('./admin/login');		// Kiểm tra trạng thái đăng nhập		
	}
	
	public function index() {
		$result = $this->field_model->getFieldByAgency(3);
		var_dump($result);
	}
	
	public function getStaffByAgency() {
		$agency_id = $this->input->post('agency_id');
		
		if($agency_id > 0) {
			$result = $this->staff_model->getStaffByAgency($agency_id);
			foreach($result as $item) {
				echo '<option value="' . $item['staff_id'] . '">' . $item['fullname'] . '</option>';
			}
		} 
		
		if($agency_id == 0) {
			$result = $this->staff_model->getAllStaff();
			foreach($result as $item) {
				echo '<option value="' . $item['staff_id'] . '">' . $item['fullname'] . '</option>';
			}			
		}
		
	}
	
	public function getFieldByAgency() {
		$agency_id = $this->input->post('agency_id');
		
		if($agency_id > 0) {
			$result = $this->field_model->getFieldByAgency($agency_id);
			foreach($result as $item) {
				echo '<option value="' . $item['field_id'] . '">' . $item['field_name'] . '</option>';
			}
		} 
		
		if($agency_id == 0) {
			$result = $this->field_model->getAllField();
			foreach($result as $item) {
				echo '<option value="' . $item['field_id'] . '">' . $item['field_name'] . '</option>';
			}			
		}
		
	}	
	
	public function getServiceByAgency() {
		$agency_id = $this->input->post('agency_id');
		
		if($agency_id == 0) return;
		
		$result = $this->field_model->getFieldByAgency($agency_id);
				
		echo '<select name="'.'service_id'.'">';
		foreach($result as $item) {
			
			$result2 = $this->service_model->getServiceByField($item['field_id']);
			
			foreach($result2 as $item) {
				echo '<option value="' . $item['service_id'] . '">' . $item['service_name'] . '</option>';
			}
			
		}					
		echo '</select>';
		
		
	}
	
	
}

/* End of file process.php */
/* Location: ./application/controllers/ajax/process.php */