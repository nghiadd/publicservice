<div id="primary">

	<table id="table_service" >
	<tr>
		<th class="table_service_col1" >Lĩnh vực</th>
		<th class="table_service_col2" >Dịch vụ</th>
		<th class="table_service_col3" >Sửa</th>
		<th class="table_service_col4" >Xóa</th>
	</tr>
	<?php if(isset($row2)) { ?>
	<?php foreach ($row as $item): ?>
	<tr>
		<td class="table_service_col1" ><?php echo $row2[$item['field_id']]['field_name']; ?></td>
		<td class="table_service_col1" ><?php echo $item['service_name'];  ?></td>
		<td class="table_service_col3" ><a href="./service/edit/<?php echo $item['service_id']; ?>">Sửa</a></td>
		<td class="table_service_col4" ><a href="./service/delete/<?php echo $item['service_id']; ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a></td>
	</tr>
	<?php endforeach; ?>		
	<?php }?>

	</table>

	<!-- End #agency -->

</div>
<!-- End #primary-->
<div class="clear">
</div>
</div> 
<!-- End #mainContent -->
