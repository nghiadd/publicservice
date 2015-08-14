<?php

class Upload extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		unlink('./uploads/Cap_moi_Chung_minh_nhan_dan_tai.doc');
		$this->load->view('upload_form', array('error' => ' '));
	}
	
	public function do_upload()
	{	
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'doc';
		$config['max_size']	= '1000';
		$config['max_width']  = '1920';
		$config['max_height']  = '1200';
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('myfile'))
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);			
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('upload_success', $data);
		}
	}

}
?>