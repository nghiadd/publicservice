		<div id="primary">
			<h2>Thủ tục hành chính công</h2>
			<div id="content">	
			<h3>Có <span><?php $id = $this->uri->segment(3); echo $this->service_model->getServiceByFieldToPagination($id); ?></span> thủ tục</h3>
				<table id="list_service">
					<tr>
						<th class="list_service_col1" >STT</th>
						<th class="list_service_col2" >Tên thủ tục</th>
						<th class="list_service_col3" >Cơ quan thực hiện</th>
						<th class="list_service_col4" >Lĩnh vực</th>
					</tr>
					<?php $i = $this->uri->segment(5); if($i == NULL) $i = 0; ?>
					<?php foreach($row5 as $item): ?>
					<tr>
						<td class="list_service_col1" ><?php echo ++$i; ?></td>
						<td class="list_service_col2" ><a href="<?php echo $base.'/thutuchanhchinh/dichvu/'.$item['slug']; ?>"><?php echo $item['service_name']; ?></a></td>
						<td class="list_service_col3" ><?php echo $row7['agency_name']; ?></td>
						<td class="list_service_col4" ><?php echo $row6['field_name']; ?></td>
					</tr>
					<?php endforeach; ?>
				</table>
				<!-- End #table_bottom -->
				
				<!-- End #pagination -->
			</div>
			<!-- End #content -->
		<?php echo $this->pagination->create_links(); ?>		
		</div>
		<!-- End #primary-->
		
		<div class="clear">
		</div>
		
	</div> 
	<!-- End #mainContent -->