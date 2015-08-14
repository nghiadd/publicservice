<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo $title;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="<?php echo "$base/assets/css/$resetcss"; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo "$base/assets/css/$maincss"; ?>" />
<link href="<?php echo $base.'/assets/css/redmond/jquery-ui-1.10.4.custom.css'; ?>" rel="stylesheet" type="text/css" />
<script src="<?php echo $base.'/assets/js/jquery-1.10.2.js'; ?>"></script>
<script src="<?php echo $base.'/assets/js/jquery-ui-1.10.4.custom.js'; ?>"></script>
<script src="<?php echo $base.'/assets/js/ajax_function.js'; ?>"></script>
	<script>
	$(function() {
		
		$( "#accordion" ).accordion({
			collapsible: true, 
			heightStyle: "content",
			active: false
		});
	
	});
	
	</script>
	
	<style>

	 .ui-datepicker { font-size:11px !important}
	 
#content .ui-tabs .ui-tabs-nav li {
border: 1px solid #c5c4c4;
border-radius: 0px;
}	 
#content .ui-tabs-active a {
    background-color: white;        /*To make it looks like on example pic, it is possible do do with it whatever you want*/

    color: red !important;             /*To overwrite jquery-ui.css*/
    text-decoration: none !important;     /*To overwrite jquery-ui.css*/
	
}
	#content .ui-widget-header {
	border: none;
	background: white;
	color: #ffffff;
	font-weight: bold;
}

#content .ui-widget-content {
	border: none;
	background: white;
	color: #222222;
}

#content .ui-state-default,
#content .ui-widget-content .ui-state-default,
#content .ui-widget-header .ui-state-default {

	border: none;
	background: white;
	font-weight: bold;
	color: #f1f1f1;
}

#content .ui-state-default a,
#content .ui-state-default a:link,
#content .ui-state-default a:visited {
	color: #191919;
	text-decoration: none;
}

#content .ui-state-hover,
#content .ui-widget-content .ui-state-hover,
#content .ui-widget-header .ui-state-hover,
#content .ui-state-focus,
#content .ui-widget-content .ui-state-focus,
#content .ui-widget-header .ui-state-focus {
	border: none;
	background: white;
	font-weight: bold;
	color: #f1f1f1;
}

#content .ui-state-active,
#content .ui-widget-content .ui-state-active,
#content .ui-widget-header .ui-state-active {
	
	background: white;
	font-weight: bold;
	color: #e17009;
}

#content #tabs-2, #content #tabs-3, #content #tabs-4, #content #tabs-5 {
line-height: 20px;
}
div#search {
height: 20px;
width: auto;
}
div#search p {
float: left;
line-height: 20px;
font-size: 12px;
font-style: italic;
color: #1e3df9;
}
div#search form {
float: right;
}
div#search form input#search_input {
height: 20px;
width: 200px;
margin-top: 2px;
padding-left: 5px;
color: #191919;
}

div#search form input#search_submit {
width: 80px;
height: 24px;
}
	</style>
</head>
<body>
<div id="container">
	<div id="header">
		<div id="logo">
		<img src="<?php echo $base.'/assets/images/banner-tthc-Hy.jpg'; ?>" alt="CỔNG THÔNG TIN ĐIỆN TỬ - ĐẠI HỌC CÔNG NGHỆ - ĐẠI HỌC QUỐC GIA HÀ NỘI" />
		</div>
		<!-- End #logo -->
		
		<div id="mainNav">
		<ul>
		<li><a href="<?php echo $base; ?>" <?php if($this->uri->segment(1) == NULL) echo 'class="active_nav"'; ?>>Trang chủ</a></li>
		<li><a href="<?php echo $base.'/thutuchanhchinh'; ?>" <?php if($this->uri->segment(1) == "thutuchanhchinh") echo 'class="active_nav"'; ?>>Thủ tục hành chính</a></li>
		<li><a href="<?php echo $base.'/answer_question'; ?>" <?php if($this->uri->segment(1) == "answer_question") echo 'class="active_nav"'; ?>>Công dân</a></li>
		<li><a href="<?php echo $base.'/faq'; ?>" <?php if($this->uri->segment(1) == "faq") echo 'class="active_nav"'; ?>>FAQ</a></li>
		</ul>
		</div>
		<div id="search">
		<p><?php echo date("d/m/Y"); ?></p>
		<form action="<?php echo $base.'/thutuchanhchinh/timkiem'; ?>" method="post">
			<input type="text" name="txt_search" id="search_input" />
			<input type="submit" name="submit" value="Tìm kiếm" id="search_submit" />
		</form>
		</div>
		<!-- End #mainNav -->
	
<!-- 		<div id="searchform">
		<form>
		<input type="text" width="180px" height="50px" id="searchform" />
		<input type="submit" value="
		</form>
		</div> -->
		<!-- End #searchform -->
		
	<!--</div> -->
	<!-- End #header -->
	