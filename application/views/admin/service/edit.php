<div id="primary">
<form method='POST' action='' enctype="multipart/form-data" class="form_create" >
<label>Chọn lĩnh vực</label>
<select name="field_id" >
<?php foreach($row2 as $item): ?>
<option value="<?php if(isset($item['field_id'])) echo $item['field_id']; ?>" <?php if($item['field_id'] == $row['field_id']) echo "checked"; ?>><?php if(isset($item['field_name'])) echo $item['field_name']; ?></option>
<?php endforeach; ?>
</select>
<br />
<label>Tên dịch vụ</label>
<input type="text" name="service_name" value="<?php echo $row['service_name']; ?>" class="input_create" /><br />
<label>Hiển thị trên website </label> 
<input type="radio" name="status" value="1" <?php if($row['status'] == 1) echo "checked"; ?>><span>Có</span><br />
<input type="radio" name="status" value="0" <?php if($row['status'] == 0) echo "checked"; ?>><span>Không</span></br>
<label>Cho phép đăng ký qua mạng </label>
<input type="radio" name="online" value="1" <?php if($row['online'] == 1) echo "checked"; ?>><span>Có</span><br>
<input type="radio" name="online" value="0" <?php if($row['online'] == 0) echo "checked"; ?>><span>Không</span></br>
<label>Cơ quan thực hiện</label>
<?php echo $this->ckeditor->editor("coquan",$row['coquan']);?>
<label>Trình tự thực hiện</label>
<?php echo $this->ckeditor->editor("trinhtu",$row['trinhtu']);?>
<label>Cách thức thực hiện</label>
<?php echo $this->ckeditor->editor("cachthuc",$row['cachthuc']);?>
<label>Đối tượng thực hiện</label>
<input type="text" name="doituong" class="input_create" value="<?php echo $row['doituong']; ?>" /><br />
<label>Thời hạn giải quyết</label>
<?php echo $this->ckeditor->editor("thoihan",$row['thoihan']);?>
<label>Lệ phí</label>
<?php echo $this->ckeditor->editor("lephi",$row['lephi']);?>
<label>Kết quả thực hiện</label>
<input type="text" name="ketqua" class="input_create" value="<?php echo $row['ketqua']; ?>" /><br />
<label>Đơn mẫu</label>
<input type="text" name="donmau" class="input_create" value="<?php echo $row['donmau']; ?>"/><br />
<label>Thành phần hồ sơ</label>
<?php echo $this->ckeditor->editor("profile",$row['profile']);?>
<label>Số lượng hồ sơ</label>
<input type="text" name="profile_quantity" class="input_create" value="<?php echo $row['profile_quantity']; ?>"/><br />
<label>Yêu cầu điều kiện</label>
<?php echo $this->ckeditor->editor("yeucau",$row['yeucau']);?>
<label>Căn cứ pháp lý</label>
<?php echo $this->ckeditor->editor("cancuphaply",$row['cancuphaply']);?>
<input type="submit" value="Sửa" name="submit" class="submit_create" />
</form>

</div>
<!-- End #primary-->
<div class="clear">
</div>
</div> 
<!-- End #mainContent -->