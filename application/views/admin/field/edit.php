<div id="primary">
<form method='POST' action='' class="form_create" >
<label>Tên lĩnh vực</label> 
<input type="text" name="field_name" value="<?php echo $row['field_name']; ?>" class="input_create" /><br />
<label>Cán bộ phụ trách</label>
<select name="staff_id" >
<?php foreach($row2 as $item): ?>
<option value="<?php if(isset($item['staff_id'])) echo $item['staff_id']; ?>"><?php if(isset($item['fullname'])) echo $item['fullname']; ?></option>
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