<!DOCTYPE html>
<html>
<head>
<title><?php echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-script-type" content="text/javascript" />
<meta http-equiv="content-style-type" content="text/css" />
   


</head>
<body>
<?php 
$str = "/Cấp/";
foreach($row as $item) {
	if (preg_match($str, $item['service_name'], $matches)) {
		echo "Match was found <br />";
	}
			
}
?>
</body>
</html>