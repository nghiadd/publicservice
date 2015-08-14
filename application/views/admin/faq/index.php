<div id="primary">

	<table id="table_faq" >
	<tr>
		<th class="table_faq_col1" >STT</th>
		<th class="table_faq_col2" >Câu hỏi</th>
		<th class="table_faq_col3" >Dịch vụ</th>
		<th class="table_faq_col4" >Sửa</th>
		<th class="table_faq_col5" >Xóa</th>
	</tr>
	<?php $i = $this->uri->segment(3); if($i == NULL) $i = 0; ?>
	<?php foreach ($row3 as $item): ?>
	<tr>
		<td class="table_faq_col1" ><?php echo ++$i; ?></td>
		<td class="table_faq_col1" ><?php echo $item['faq_name']; ?></td>
		<td class="table_faq_col3" ><?php echo $row2[$item['service_id']]['service_name']; ?></td>
		<td class="table_faq_col4" ><a href="./faq/edit/<?php echo $item['faq_id']; ?>">Sửa</a></td>
		<td class="table_faq_col5" ><a href="./faq/delete/<?php echo $item['faq_id']; ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a></td>
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
