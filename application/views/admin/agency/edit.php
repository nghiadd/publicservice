<div id="primary">
<form method='POST' action='' class="form_create" >
<label>Tên cơ quan</label> 
<input type="text" name="agency_name" class="input_create" value="<?php if(isset($row['agency_name'])) echo $row['agency_name']; ?>" /><br />
<input type="submit" value="Sửa" name="submit" class="submit_create" />
</form>

</div>
<!-- End #primary-->
<div class="clear">
</div>
</div> 
<!-- End #mainContent -->