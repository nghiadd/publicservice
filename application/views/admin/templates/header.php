<!DOCTYPE html>
<html>
<head>
<title><?php echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-script-type" content="text/javascript" />
<meta http-equiv="content-style-type" content="text/css" />
   
<link rel="stylesheet" type="text/css" href="<?php echo "$base/assets/css/$resetcss"; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo "$base/assets/css/$admincss"; ?>" />
<link href="<?php echo $base.'/assets/css/redmond/jquery-ui-1.10.4.custom.css'; ?>" rel="stylesheet" type="text/css" />
<script src="<?php echo $base.'/assets/js/jquery-1.10.2.js'; ?>"></script>
<script src="<?php echo $base.'/assets/js/jquery-ui-1.10.4.custom.js'; ?>"></script>
<script src="<?php echo $base.'/assets/js/ajax_function.js'; ?>"></script>
<script type="text/javascript" src="<?php echo $base.'/assets/ckeditor/ckeditor.js' ;?>"></script>
	<script>
	$(function() {
		
		$( "#accordion" ).accordion({
			collapsible: true, 
			heightStyle: "content",
			active: false
		});
	
		$( "#datepicker" ).datepicker({
			dateFormat: "dd/mm/yy"
		});
		
	});
	
	</script>
	
	<style>

	 .ui-datepicker { font-size:11px !important}
	</style>
</head>
<body>
<div id="wrapper">
	<div id="header">
		<img src="<?php echo "$base/assets/images/banner-tthc-Hy.jpg"; ?>" alt="CỔNG THÔNG TIN ĐIỆN TỬ - ĐẠI HỌC CÔNG NGHỆ - ĐẠI HỌC QUỐC GIA HÀ NỘI" />
		<p>Chào <span><?php echo $this->session->userdata('username'); ?></span> <a href="<?php echo $base.'/admin/logout'; ?>"><i>(Đăng xuất)</i></a></p>
		<h2>Thủ tục hành chính - Trang quản trị</h2>
	</div> 
	<!-- End #header -->

