<div id="primary">

<form method='POST' action='' enctype="multipart/form-data" class="form_create" >
<label>Chọn lĩnh vực</label>
<select name="field_id" >
<?php foreach($row as $item): ?>
<option value="<?php if(isset($item['field_id'])) echo $item['field_id']; ?>"><?php if(isset($item['field_name'])) echo $item['field_name']; ?></option>
<?php endforeach; ?>
</select>
<br />
<label>Tên dịch vụ</label>
<input type="text" name="service_name" class="input_create" /><br />
<label>Hiển thị trên website </label> 
<input type="radio" name="status" value="1" checked><span>Có</span><br />
<input type="radio" name="status" value="0" ><span>Không</span></br>
<label>Cho phép đăng ký qua mạng </label>
<input type="radio" name="online" value="1" ><span>Có</span><br>
<input type="radio" name="online" value="0" checked><span>Không</span></br>
<label>Cơ quan thực hiện</label>
<?php echo $this->ckeditor->editor("coquan","");?>
<label>Trình tự thực hiện</label>
<?php echo $this->ckeditor->editor("trinhtu","");?>
<label>Cách thức thực hiện</label>
<?php echo $this->ckeditor->editor("cachthuc","");?>
<label>Đối tượng thực hiện</label>
<input type="text" name="doituong" class="input_create" /><br />
<label>Thời hạn giải quyết</label>
<?php echo $this->ckeditor->editor("thoihan","");?>
<label>Lệ phí</label>
<?php echo $this->ckeditor->editor("lephi","");?>
<label>Kết quả thực hiện</label>
<input type="text" name="ketqua" class="input_create" /><br />
<label>Đơn mẫu</label>
<input type="text" name="donmau" class="input_create" /><br />
<label>Tải đơn mẫu</label>
<input type="file" name="donmau_link" id="donmau"><br>
<label>Thành phần hồ sơ</label>
<?php echo $this->ckeditor->editor("profile","");?>
<label>Số lượng hồ sơ</label>
<input type="text" name="profile_quantity" class="input_create" /><br />
<label>Yêu cầu điều kiện</label>
<?php echo $this->ckeditor->editor("yeucau","");?>

<label>Căn cứ pháp lý</label>
<?php echo $this->ckeditor->editor("cancuphaply","");?>
<input type="submit" value="Thêm" name="submit" class="submit_create" />
</form>

</div>
<!-- End #primary-->
<div class="clear">
</div>
</div> 
<!-- End #mainContent -->