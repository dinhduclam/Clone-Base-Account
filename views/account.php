<div id="main-page">
	<div class="user-title">
		<div class="box-title">
			<i class="fa-solid fa-arrow-left fa-xl"></i>
			<label>Tài khoản</label>
			<div class="title">
				<?php echo $fullname . '  ·  ' . $title  ?>
			</div>
		</div>
		<div class="button" onclick="openEditProfile()">
			<i class="fa-solid fa-arrow-up fa-sm"></i>
			Chỉnh sửa tài khoản
		</div>
	</div>

	<div id="profile">
		<div class="summary">
			<div class="avatar">
				<img src="https://data-gcdn.basecdn.net/avatar/sys5407/36/94/f9/71/e2/5198e1f158f741ab122716c0c8924062/1.lamdinh_5407.jpg?ts=1681122263">
			</div>
			<div class="summary-info">
				<div class="fullname">
					<?php echo $fullname ?>
				</div>
				<div class="title">
					<?php echo $title ?>
				</div>
				<div class="info-row">
					<div class="field">
						Địa chỉ email
					</div>
					<div class="value">
						<?php echo $email ?>
					</div>
				</div>
				<div class="info-row">
					<div class="field">
						Số điện thoại
					</div>
					<div class="value">
						<?php echo $phone ?? "Không có thông tin" ?>
					</div>
				</div>
			</div>
		</div>
		<div class="box-info">
			<div class="box-title">THÔNG TIN LIÊN HỆ</div>
			<div class="info-row">
				<div class="field">
					Địa chỉ
				</div>
				<div class="value">
					<?php echo $address ?? "Không có thông tin" ?>
				</div>
			</div>
		</div>

		<div class="box-info">
			<div class="box-title">NHÓM</div>
			<div class="info-none">
				Không có thông tin.
			</div>
		</div>

		<div class="box-info">
			<div class="box-title">NHÂN VIÊN TRỰC TIẾP</div>
			<div class="info-none">
				Không có thông tin.
			</div>
		</div>

		<div class="box-info">
			<div class="box-title">HỌC VẤN</div>
			<div class="info-none">
				Không có thông tin.
			</div>
		</div>

		<div class="box-info">
			<div class="box-title">KINH NGHIỆM LÀM VIỆC</div>
			<div class="info-none">
				Không có thông tin.
			</div>
		</div>

		<div class="box-info">
			<div class="box-title">GIẢI THƯỞNG & THÀNH TÍCH</div>
			<div class="info-none">
				Không có thông tin.
			</div>
		</div>
	</div>
</div>
