<!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-script-type" content="text/javascript" />
<meta http-equiv="content-style-type" content="text/css" />
<script src="http://localhost/publicservice/assets/js/jquery-1.10.2.js" ></script>
   
<style>
body {
background: url('../assets/images/bg.jpg') repeat;
font-family: Arial, Helvetica, Sans-serif;
color: white;
}


form {
margin: 100px 0px 0px 200px;
}

form h2 {
font-size: 200%;
font-weight: bold;
text-transform: uppercase;
}

form label {
display: block;
font-weight: bold;
font-size: 14px;
margin: 15px 0px 5px 0px;
}

form input {
border-radius: 5px;
border: none;
height: 30px;
width: 250px;
padding-left: 10px;
line-height: 30px;
font-size: 14px;
}

form input.submit {
margin-top: 10px;
width: 120px;
font-weight: bold;
text-transform: uppercase;
padding-right: 10px;
font-size: 14px;
}

form input.submit:hover {
cursor: pointer;
}

p.error {
font-style: italic;
color: #ff3300;
}

span.error_msg {
font-style: italic;
color: #ff3300;
padding-left: 20px;
}

span.error_msg p {
display: inline;
}
</style>
</head>
<body>

<?php echo form_open('admin/login'); ?>
<h2>Trang quản trị</h2>
<p class="error"><?php if(isset($error)) echo $error; ?></p>
<label>Username</label>
<input type="text" name="username" value="" size="50" /><span class="error_msg" ><?php echo form_error('username'); ?></span><br />

<label>Password</label>
<input type="password" name="password" value="" size="50" /><span class="error_msg" ><?php echo form_error('password'); ?></span>
<!--
<h5>Password Confirm</h5>
<input type="text" name="passconf" value="" size="50" />
-->
<br />
<input type="submit" value="Đăng nhập" class="submit" />

</form>
<script>

</script>
</body>
</html>