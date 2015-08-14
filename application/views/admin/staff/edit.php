<div id="primary">
<form method='POST' action='' class="form_create" >
<label>Username</label> 
<input type="text" name="username" value="<?php if(isset($row['username'])) echo $row['username']; ?>" class="input_create" /><br />
<label>Password</label> 
<input type="text" name="password" value="<?php if(isset($row['password'])) echo $row['password']; ?>" class="input_create" /><br />
<label>Fullname</label> 
<input type="text" name="fullname" value="<?php if(isset($row['fullname'])) echo $row['fullname']; ?>" class="input_create" /><br />
<label>Ngày sinh</label>
<input type="text" name="birthday" value="<?php if(isset($row['birthday'])) echo $row['birthday']; ?>" class="input_create" id="datepicker" /><br />
<label>Trực thuộc cơ quan</label>
<select name="agency_id" >
<?php foreach($row2 as $item): ?>

<option value="<?php if(isset($item['agency_id'])) echo $item['agency_id']; ?>" <?php if($row['agency_id'] == $item['agency_id']) echo "selected";?>><?php if(isset($item['agency_name'])) echo $item['agency_name']; ?></option>
<?php endforeach; ?>
</select>
<br />

<input type="submit" value="Sửa" name="submit" class="submit_create" />
</form>

</div>
<!-- End #primary-->
<div class="clear">
</div>
</div> 
<!-- End #mainContent -->