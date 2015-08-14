<div id="primary">
<form method='POST' action='' class="form_create" >
<label>Tên câu hỏi </label>
<?php echo $this->ckeditor->editor("aq_name",$row['aq_name']);?>
<label>Trả lời</label>
<?php echo $this->ckeditor->editor("aq_answer",$row['aq_answer']);?>
<label>Hiển thị trên website</label>
<input type="radio" name="status" value="1" <?php if($row['status'] == 1) echo "checked"; ?>><span>Có</span><br />
<input type="radio" name="status" value="0" <?php if($row['status'] == 0) echo "checked"; ?>><span>Không</span></br>
<input type="submit" value="Trả lời" name="submit" class="submit_create" />
</form>

</div>
<!-- End #primary-->
<div class="clear">
</div>
</div> 
<!-- End #mainContent -->