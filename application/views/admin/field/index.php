<div id="primary">
	<table id="table_field" >
	<tr>
		<th class="table_field_col1" >STT</th>
		<th class="table_field_col2" >Tên lĩnh vực</th>
		<th class="table_field_col3" >Cơ quan thực hiện</th>
		<th class="table_field_col4" >Sửa</th>
		<th class="table_field_col5" >Xóa</th>
	</tr>
	<?php $i = $this->uri->segment(3); if($i == NULL) $i = 0; ?>
	<?php foreach ($row as $item): ?>
	<tr>
		<td class="table_field_col1" ><?php echo ++$i; ?></td>
		<td class="table_field_col2" ><?php echo $item['field_name']; ?></td>
		<td class="table_field_col3" ><?php echo $row2[$item['field_id']]['agency_name']; ?></td>
		<td class="table_field_col4" ><a href="./field/edit/<?php echo $item['field_id']; ?>">Sửa</a></td>
		<td class="table_field_col5" ><a href="./field/delete/<?php echo $item['field_id']; ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a></td>
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