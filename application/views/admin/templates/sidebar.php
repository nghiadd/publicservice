<div id="mainContent">
		<div id="sidebar">
			<div id="user_sidebar" <?php if($this->session->userdata('staff_group_id') == 3) echo "class=\"hide_by_group\"";?>>
				<h2>Quản trị người dùng</h2>
				<ul>
					<li><a href="<?php echo $base.'/admin/staff'; ?>">Danh sách cán bộ</a></li>
					<li><a href="<?php echo $base.'/admin/staff/create'; ?>">Thêm cán bộ</a></li>
				</ul>
			</div>
			<!-- End #user_sidebar -->
			
			<div id="agency_sidebar" <?php if($this->session->userdata('staff_group_id') == 3) echo "class=\"hide_by_group\"";?>>
				<h2>Quản lý ban ngành</h2>
				<ul>
					<li><a href="<?php echo $base.'/admin/agency'; ?>">Cơ quan ban hành</a></li>
					<li><a href="<?php echo $base.'/admin/agency/create'; ?>">Thêm ban ngành</a></li>
				</ul>
			</div>
			<!-- End #agency_sidebar -->

			<div id="field_sidebar" <?php if($this->session->userdata('staff_group_id') == 3) echo "class=\"hide_by_group\"";?>>
				<h2>Quản lý danh mục</h2>
				<ul>
					<li><a href="<?php echo $base.'/admin/field'; ?>">Danh sách lĩnh vực</a></li>
					<li><a href="<?php echo $base.'/admin/field/create'; ?>">Thêm lĩnh vực mới</a></li>
				</ul>
			</div>
			<!-- End #field_sidebar -->
			
			<div id="service_sidebar" <?php if($this->session->userdata('staff_group_id') == 2) echo "class=\"hide_by_group\"";?>>
				<h2>Quản lý dịch vụ</h2>
				<ul>
					<li><a href="<?php echo $base.'/admin/service'; ?>">Danh sách dịch vụ</a></li>
					<li><a href="<?php echo $base.'/admin/service/create'; ?>">Thêm dịch vụ mới</a></li>
				</ul>
			</div>
			<!-- End #service_sidebar -->
			
			<div id="answer_sidebar" <?php if($this->session->userdata('staff_group_id') == 2) echo "class=\"hide_by_group\"";?>>
				<h2>Quản lý hỏi đáp</h2>
				<ul>
					<li><a href="<?php echo $base.'/admin/answer_question'; ?>">Danh sách câu hỏi</a></li>
				</ul>
			</div>
			<!-- End #answer_sidebar -->

			<div id="faq_sidebar" <?php if($this->session->userdata('staff_group_id') == 2) echo "class=\"hide_by_group\"";?>>
				<h2>Câu hỏi thường gặp</h2>
				<ul>
					<li><a href="<?php echo $base.'/admin/faq'; ?>">Danh sách câu hỏi</a></li>
					<li><a href="<?php echo $base.'/admin/faq/create'; ?>">Thêm câu hỏi thường gặp</a></li>
				</ul>
			</div>
			<!-- End #faq_sidebar -->			
			
			<div id="account">
				<h2>Quản lý tài khoản</h2>
				<ul>
					<li><a href="<?php echo $base.'/admin/changepass'; ?>">Đổi mật khẩu</a></li>
					<li><a href="<?php echo $base.'/admin/logout'; ?>">Đăng xuất</a></li>
				</ul>
			</div>
			<!-- End #account -->
			
		</div>
		<!-- End #sidebar -->