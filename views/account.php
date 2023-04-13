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
				<img src="../public/avatar/<?php echo $avatar ?>">
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

<div id="dialog" hidden>
	<div class="background"></div>
	<form id="edit-profile" action="/api/account/edit" method="POST" enctype="multipart/form-data">
		<div class="header">
			Chỉnh sửa thông tin cá nhân
		</div>
		<div class="row">
			<div class="label">
				<div class="main-label">Tên của bạn</div>
				<div class="sub-label">Tên của bạn</div>
			</div>
			<input type="text" name="firstname" placeholder="Tên của bạn" require>
		</div>

		<div class="row">
			<div class="label">
				<label class="main-label">Tên của bạn</label>
				<label class="sub-label">Tên của bạn</label>
			</div>
			<input type="text" name="lastname" placeholder="Họ của bạn" require>
		</div>

		<div class="row">
			<div class="label">
				<label class="main-label">Email</label>
				<label class="sub-label">Email của bạn</label>
			</div>
			<input type="text" value="<?php echo $email?>" readonly>
		</div>

		<div class="row">
			<div class="label">
				<label class="main-label">Username</label>
				<label class="sub-label">Username của bạn</label>
			</div>
			<input type="text" name="username" value="<?php echo $username?>" readonly>
		</div>

		<div class="row">
			<div class="label">
				<label class="main-label">Vị trí công việc</label>
				<label class="sub-label">Vị trí công việc</label>
			</div>
			<input type="text" name="title" placeholder="Vị trí công việc">
		</div>

		<div class="row">
			<div class="label">
				<label class="main-label">Ảnh đại diện</label>
				<label class="sub-label">Ảnh đại diện</label>
			</div>
			<input type="file" name="avatar">
		</div>

		<div class="row">
			<div class="label">
				<label class="main-label">Ngày tháng năm sinh</label>
				<label class="sub-label">Ngày tháng năm sinh</label>
			</div>
			<input type="date" name="dob" placeholder="Vị trí công việc">
		</div>

		<div class="row">
			<div class="label">
				<label class="main-label">Số điện thoại</label>
				<label class="sub-label">Số điện thoại</label>
			</div>
			<input type="text" name="phone" placeholder="Số điện thoại">
		</div>

		<div class="row">
			<div class="label">
				<label class="main-label">Chỗ ở hiện nay</label>
				<label class="sub-label">Chỗ ở hiện nay</label>
			</div>
			<input type="text" name="address" placeholder="Chỗ ở hiện nay">
		</div>

		<div class="button-list">
			<div class="cancel" onclick="closeEditProfile()">Bỏ qua</div>
			<div class="submit" onclick="updateProfile()">Cập nhật</div>
		</div>
	</form>
</div>

<div id="dialog-alert" hidden>
	<div class="background"></div>
	<div class="wrapper">
		<div class="content">
			<span></span>
			<div class="close-button" onclick="$('#dialog-alert').hide()">x</div>
		</div>
		<div class="confirm-button" onclick="$('#dialog-alert').hide(); location.reload()">OK</div>
	</div>
</div>
