<div id="primary">

<form method='POST' action='' class="form_create" >
<label>Tên lĩnh vực</label> 
<input type="text" name="field_name" class="input_create" /><br />
<label>Cơ quan ban hành</label>
<select name="agency_id" id="agency_select" onchange="showStaff(this.value)">
	<option value="0">---Tất cả cơ quan---</option>
	<?php foreach($row2 as $item): ?>
		<option value="<?php if(isset($item['agency_id'])) echo $item['agency_id']; ?>"><?php if(isset($item['agency_name'])) echo $item['agency_name']; ?></option>
	<?php endforeach; ?>
</select>
<br />
<label>Phân quyền cho cán bộ</label>
<select name="staff_id" id="staff_select">
	<?php foreach($row3 as $item): ?>
		<option value="<?php if(isset($item['staff_id'])) echo $item['staff_id']; ?>"><?php if(isset($item['fullname'])) echo $item['fullname']; ?></option>
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