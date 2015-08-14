<div id="primary">

<form method='POST' action='' class="form_create">
<label>Dịch vụ</label>
<select name="service_id">
<?php foreach($row as $item): ?>
	<option value="<?php echo $item['service_id']; ?>"><?php echo $item['service_name']; ?></option>
<?php endforeach; ?>
</select>
<br />
<label>Câu hỏi</label>
<?php echo $this->ckeditor->editor("faq_name","");?>
<label>Câu trả lời</label>
<?php echo $this->ckeditor->editor("faq_answer","");?>
<input type="hidden" name="staff_id" value="<?php echo $this->session->userdata('staff_id'); ?>" />
<input type="submit" value="Thêm" name="submit" class="submit_create" />
</form>

</div>
<!-- End #primary-->
<div class="clear">
</div>
</div> 
<!-- End #mainContent -->