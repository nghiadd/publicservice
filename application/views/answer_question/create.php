<div id="mainContent">

<form method='POST' action='' class="form_create" >
<label>Cơ quan ban hành</label>
<select name="agency_id" id="agency_select" onchange="showService(this.value)" >
	<option value="0">---Tất cả cơ quan---</option>
	<?php foreach($row as $item): ?>
		<option value="<?php if(isset($item['agency_id'])) echo $item['agency_id']; ?>"><?php if(isset($item['agency_name'])) echo $item['agency_name']; ?></option>
	<?php endforeach; ?>
</select>
<br />

<label>Dịch vụ</label>
<div id="service_select">
</div>

<label>Họ tên</label> 
<input type="text" name="fullname" class="input_create" /><br />
<label>Câu hỏi</label> 
<textarea name="aq_name" class="textarea_create" >
</textarea>
<br />
<input type="submit" value="Gửi" name="submit" class="submit_create" />
</form>

<!-- End #primary-->
<div class="clear">
</div>
</div> 
<!-- End #mainContent -->
