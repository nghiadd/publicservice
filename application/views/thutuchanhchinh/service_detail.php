		<div id="primary">
			<h2>Thủ tục hành chính công</h2>
			<div id="content">	
				<h3><?php echo $row['service_name']; ?></h3>
				<div id="tabs">
					<ul>
						<li><a href="#tabs-1">Thông tin</a></li>
						<li><a href="#tabs-2">Trình tự thực hiện</a></li>
						<li><a href="#tabs-3">Hồ sơ</a></li>
						<li><a href="#tabs-4">Yêu cầu - Điều kiện</a></li>
						<li><a href="#tabs-5">Căn cứ pháp lý</a></li>
						<li><a href="#tabs-6">Tải về</a></li>
					</ul>
					<div id="tabs-1">
					<table id="service_detail">
						<tr>
							<td class="service_detail_col1" >Lĩnh vực</td>
							<td class="service_detail_col2" ><a href="<?php echo $base.'/thutuchanhchinh/linhvuc/'.$row2['field_id'] ; ?>"><?php echo $row2['field_name']; ?></a></td>
						</tr>
						<tr>
							<td class="service_detail_col1" >Cơ quan thực hiện</td>
							<td class="service_detail_col2" ><?php echo $row['coquan']; ?></td>
						</tr>
						<tr>
							<td class="service_detail_col1" >Cách thức thực hiện</td>
							<td class="service_detail_col2" ><?php echo $row['cachthuc']; ?></td>
						</tr>
						<tr>
							<td class="service_detail_col1" >Đối tượng thực hiện</td>
							<td class="service_detail_col2" ><?php echo $row['doituong']; ?></td>
						</tr>
						<tr>
							<td class="service_detail_col1" >Thời hạn giải quyết</td>
							<td class="service_detail_col2" ><?php echo $row['thoihan']; ?></td>
						</tr>
						<tr>
							<td class="service_detail_col1" >Lệ phí</td>
							<td class="service_detail_col2" ><?php echo $row['lephi']; ?></td>
						</tr>
						<tr>
							<td class="service_detail_col1" >Cho phép đăng ký trên mạng</td>
							<td class="service_detail_col2" ><?php if($row['online'] == 0) echo "Không"; else echo "Có"; ?></td>
						</tr>						
						<tr>
							<td class="service_detail_col1" >Kết quả thực hiện</td>
							<td class="service_detail_col2" ><?php echo $row['ketqua']; ?></td>
						</tr>
						
					</table>
					</div>
					<div id="tabs-2">
						<?php echo $row['trinhtu']; ?>
					</div>
					<div id="tabs-3">
					<table id="service_detail">
						<tr>
							<td class="service_detail_col1" >Thành phần hồ sơ</td>
							<td class="service_detail_col2" ><?php echo $row['profile']; ?></td>
						</tr>
						<tr>
							<td class="service_detail_col1" >Số lượng hồ sơ</td>
							<td class="service_detail_col2" ><?php echo $row['profile_quantity']; ?></td>
						</tr>
					</table>
					</div>
					<div id="tabs-4">
						<?php echo $row['yeucau']; ?>
					</div>
					<div id="tabs-5">
						<?php echo $row['cancuphaply']; ?>
					</div>				
					<div id="tabs-6">
					<table id="service_detail">
						<tr>
							<td class="service_detail_col1" >Mẫu đơn, tờ khai thủ tục</td>
							<td class="service_detail_col2" ><a href="<?php echo $base.'/uploads/'.$row['donmau_link'] ;?>"><img src="<?php echo $base.'/assets/images/ICdoc.gif' ;?>" /></a></td>
						</tr>
					</table>
					</div>
				</div>			
			</div>
			<!-- End #content -->
		

		</div>
		<!-- End #primary-->
		
		<div class="clear">
		</div>
		
	</div> 
	<!-- End #mainContent -->
	
	<script>
	$( "#tabs" ).tabs();
	</script>