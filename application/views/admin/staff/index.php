<div id="primary">
	<table id="table_staff" >
	<tr>
		<th class="table_staff_col1" >Cán bộ</th>
		<th class="table_staff_col2" >Cơ quan</th>
		<th class="table_staff_col3" >Sửa</th>
		<th class="table_staff_col4" >Xóa</th>
	</tr>
	
	<?php foreach ($row as $item): ?>
	<tr>
		<td class="table_staff_col1" ><?php echo $item['fullname'];  ?></td>
		<td class="table_staff_col1" ><?php echo $row2[$item['staff_id']]['agency_name']; ?></td>
		<td class="table_staff_col3" ><a href="./staff/edit/<?php echo $item['staff_id']; ?>">Sửa</a></td>
		<td class="table_staff_col4" ><a href="./staff/delete/<?php echo $item['staff_id']; ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a></td>
	</tr>
	<?php endforeach; ?>	

	</table>
	

	<!-- End #agency -->
	
	<?php echo $this->pagination->create_links(); ?>
</div>
<!-- End #primary-->
<div class="clear">
</div>
</div> 
<!-- End #mainContent -->
