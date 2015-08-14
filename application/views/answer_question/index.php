<div id="mainContent">
<div id="aq_index">
	<h2><a href="<?php echo $base; ?>">Trang chủ</a><span>>></span>Trả lời công dân</h2>
	<h2><a href="<?php echo $base.'/answer_question/create'; ?>">Gửi câu hỏi</a></h2>
</div>
<div id="aq_list">
	<div>
	<?php $i = $this->uri->segment(3); if($i == NULL) $i = 0; ?>
	<?php foreach($row as $item): ?>
		<h3><span><?php echo ++$i; ?>. </span><?php echo $item['aq_name']; ?></h3>
		<blockquote><?php echo $item['aq_answer']; ?></blockquote>
	<?php endforeach; ?>
	</div>
	
	<?php echo $this->pagination->create_links(); ?>
</div>

<div class="clear">
</div>
</div> 
<!-- End #mainContent -->