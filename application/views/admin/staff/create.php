<div id="primary">

<form method='POST' action='' class="form_create" >
<label>Username</label> 
<input type="text" name="username" class="input_create" /><br />
<label>Password</label>
<input type="password" name="password" class="input_create" /><br />
<label>Fullname</label>
<input type="text" name="fullname" class="input_create" /><br />
<label>Ngày sinh</label>
<input type="text" name="birthday" class="input_create" id="datepicker" /><br />
<label>Trực thuộc cơ quan</label>
<select name="agency_id" >
<?php foreach($row2 as $item): ?>
<option value="<?php if(isset($item['agency_id'])) echo $item['agency_id']; ?>"><?php if(isset($item['agency_name'])) echo $item['agency_name']; ?></option>
<?php endforeach; ?>
</select>
<br />

<input type="submit" value="Thêm" name="submit" class="submit_create" />
</form>

</div>
<!-- End #primary-->
<div class="clear">
</div>
</div> 
<!-- End #mainContent -->