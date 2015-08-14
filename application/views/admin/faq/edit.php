<div id="primary">

<form method='POST' action='' class="form_create" >
<label>Câu hỏi</label>
<?php echo $this->ckeditor->editor("faq_name",$row['faq_name']);?>
<label>Câu trả lời</label>
<?php echo $this->ckeditor->editor("faq_answer",$row['faq_answer']);?>
<input type="submit" value="Sửa" name="submit" class="submit_create" />
</form>

</div>
<!-- End #primary-->
<div class="clear">
</div>
</div> 
<!-- End #mainContent -->