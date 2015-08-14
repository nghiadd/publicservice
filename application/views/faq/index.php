<div id="mainContent">
<div id="faq_main">
	<h2><a href="<?php echo $base; ?>">Trang chủ</a><span>>></span>Câu hỏi thường gặp</h2>
	
	<?php $i = $this->uri->segment(3); if($i == NULL) $i = 0; ?>
	<?php foreach($row as $item): ?>
	<div class="faq_content">
		<h3><span><?php echo ++$i; ?>. </span><?php echo $item['faq_name']; ?></h3>
		<blockquote><?php echo $item['faq_answer']; ?></blockquote>
	</div>
	<?php endforeach; ?>
	
	
</div>
	<?php echo $this->pagination->create_links(); ?>
<div class="clear">
</div>
</div> 
<!-- End #mainContent -->
<script>
/*
$('.faq_content > div').hide();
$('.faq_content a').click(function() {
	if($(this).next().is(':visible')==false){
		$(this).next().slideDown(200);
		return false;
	} else {
		$(this).next().slideUp(200);
	}	
});

*/
</script>