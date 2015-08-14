	<div id="mainContent">
			<?php 
				$row = $this->agency_model->getAllAgency();
				foreach($row as $item) {
					$row2[$item['agency_id']] = $this->field_model->getFieldByAgency($item['agency_id']);
				}
				$row3 = $this->field_model->getFieldByDistrict();
				$row4 = $this->field_model->getFieldByVillage();
			?>
	<div id="sidebar">
		<div id="agency_sidebar">
			<h2>Sở ban ngành</h2>
			<ul>
			<?php foreach($row as $item): ?>
			<?php if($item['agency_id'] == 21 || $item['agency_id'] == 22) continue; ?>
			<li class="navLevel1"><a href="#"><img width="8px" height="8px" src="<?php echo $base.'/assets/images/ui-icon-triangle.png'; ?>" /><?php echo $item['agency_name']; ?></a>
				<ul class="navLevel2">
				<?php foreach($row2[$item['agency_id']] as $item2): ?>
				<li><a href="<?php echo $base.'/thutuchanhchinh/linhvuc/'.$item2['field_id'] ; ?>"><img width="9px" height="9px" src="<?php echo $base.'/assets/images/ui-icon-arrow.png'; ?>" /><?php echo $item2['field_name']; ?></a></li>
				<?php endforeach; ?>
				</ul>
			</li>
			<?php endforeach; ?>
			</ul>
		</div>
		<div id="district_sidebar">
			<h2>Cấp huyện</h2>
			<ul>
				<?php foreach($row3 as $item): ?>
				<li><a href="<?php echo $base.'/thutuchanhchinh/linhvuc/'.$item['field_id'];; ?>"><img width="9px" height="9px" src="<?php echo $base.'/assets/images/ui-icon-arrow.png'; ?>" /><?php echo $item['field_name']; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>		
		
		<div id="village_sidebar">
			<h2>Cấp xã</h2>
			<ul>
				<?php foreach($row4 as $item): ?>
				<li><a href="<?php echo $base.'/thutuchanhchinh/linhvuc/'.$item['field_id']; ?>"><img width="9px" height="9px" src="<?php echo $base.'/assets/images/ui-icon-arrow.png'; ?>" /><?php echo $item['field_name']; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div><!-- End #sidebar -->		
			<script>
			$(".navLevel1 .navLevel2").hide();
			$(".navLevel1 > a").click(function(){
				if($(this).next().is(':visible')==false){
					//$(".navigationLevel2:visible").slideUp(100);
					$(this).next().slideDown(200);
					return false;
				}else{
					$(this).next().slideUp(200);
				}
			});
			$(".navLevel1").each(function(){
			obj = this;
			$(this).find('li').each(function(){
				if($(this).attr('class') == 'SelectedNavigation')
				{
					sel = obj;
				}
			});		
			});
			$(".navLevel12 > a").click(function(){
	        if($(this).next().is(':visible')==false){
	            //$(".navigationLevel2:visible").slideUp(100);
	            $(this).next().slideDown(100);
	            return false;
	        }else{
	            $(this).next().slideUp(100);
	        }
	    });
		var sel = null;
		$(".navLevel12").each(function(){
			obj = this;
			$(this).find('li').each(function(){
				if($(this).attr('class') == 'SelectedNavigation')
				{
					sel = obj;
				}
			});		
		});
     // end
		
		if(sel)
			$(sel).find('a').trigger('click');
		$('html').show();

	
	</script>