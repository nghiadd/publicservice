<?php

class Test extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('encrypt');
		$this->base = $this->config->item('base_url');
		$this->resetcss = $this->config->item('resetcss');
		$this->admincss = $this->config->item('admincss');
	}
	
	public function index() {
		

		$str = "chứng minh";
		$str = strtolower($str);
		$str = ascii_to_entities($str);
		$query = $this->db->get('service');
		$result = $query->result_array();
		foreach($result as $item) {
			$str_data = strtolower($item['service_name']);
			if (preg_match('/'.$str.'/', $str_data, $matches)) {
				echo $item['service_id'];
				echo $matches[0]."<br />";
			}
		}
		

	}
	
	// Hàm xử lý đăng nhập
	public function login() {
		
	}
}