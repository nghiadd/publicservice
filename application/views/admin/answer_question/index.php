<div id="primary">
	<table id="table_aq" >
	<tr>
		<th class="table_aq_col1" >STT</th>
		<th class="table_aq_col2" >Câu hỏi</th>
		<th class="table_aq_col3" >Trả lời</th>
		<th class="table_aq_col4" >Xóa</th>
	</tr>
	<?php $i = 0; ?>
	<?php foreach($row as $item): ?>
	<tr>
		<td class="table_aq_col1" ><?php echo ++$i; ?></td>
		<td class="table_aq_col2" ><?php echo $item['aq_name'];  ?></td>
		<td class="table_aq_col3" ><a href="./answer_question/answer/<?php echo $item['aq_id']; ?>"><?php if($item['aq_answer'] == NULL) echo "Chưa"; else echo "Xong"; ?></a></td>
		<td class="table_aq_col4" ><a href="./answer_question/delete/<?php echo $item['aq_id']; ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a></td>
	</tr>
	<?php endforeach; ?>

	</table>
	

	<!-- End #agency -->

</div>
<!-- End #primary-->
<div class="clear">
</div>
</div> 
<!-- End #mainContent -->