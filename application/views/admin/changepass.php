<div id="primary">
<form method='POST' action='' class="form_create" >
<label>Mật khẩu mới</label> 
<input type="password" name="password" size="40" id="new_password" class="input_create" /><br />
<label>Xác nhận</label>
<input type="password" size="40" id="conf_new_password" class="input_create" /><br />
<input type="hidden" name="staff_id" value="<?php echo $this->session->userdata('staff_id'); ?>" /><br />
<input type="submit" value="Lưu" name="submit" class="submit_create" />
</form>

</div>
<!-- End #primary-->
<div class="clear">
</div>
</div> 
<!-- End #mainContent -->