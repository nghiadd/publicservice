<div id="primary">

	<table id="table_agency" >
	<tr>
		<th class="table_agency_col1" >Cơ quan ban hành</th>
		<th class="table_agency_col2" >Sửa</th>
		<th class="table_agency_col3" >Xóa</th>
	</tr>
	
	<?php foreach ($row as $item): ?>
	<tr>
		<td class="table_agency_col1" ><?php echo $item['agency_name']; ?></td>
		<td class="table_agency_col2" ><a href="./agency/edit/<?php echo $item['agency_id']; ?>">Sửa</a></td>
		<td class="table_agency_col3" ><a href="./agency/delete/<?php echo $item['agency_id']; ?>" onclick="return confirm('Toàn bộ dữ liệu liên quan đến ban ngành này cũng sẽ bị xóa. Bạn chắc chắn muốn tiếp tục?')">Xóa</a></td>
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
