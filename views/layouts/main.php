<!DOCTYPE html>
<html>
	<head>
		<title> <?php echo $fullname.' - Tài khoản - True Platform' ?> </title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<link rel="shortcut icon" href="../../public/img/fav.png" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:500,400,300,400italic,700,700italic,400italic,300italic&subset=vietnamese,latin">
		<link rel="stylesheet" type="text/css" href="../../public/css/app.css">
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://kit.fontawesome.com/077db66cfb.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="../public/css/account.css">
		<script src="../public/js/account.js"></script>
	</head>
	<body>
		<div id="left-panel">
			<div class="item">
				<div class="avatar">
					<img src="https://data-gcdn.basecdn.net/avatar/sys5407/36/94/f9/71/e2/5198e1f158f741ab122716c0c8924062/0.lamdinh_5407.jpg?ts=1681093410">
				</div>
			</div>

			<div class="item active" title="Tài khoản" data-url="account">
			<i class="fa-solid fa-user fa-lg"></i>
				<div class="info">Cá nhân</div>
			</div>

			<div class="item" title="Thông báo">
				<i class="fa-solid fa-bell fa-lg"></i>
				<div class="info">Thông báo</div>
			</div>

			<div class="item">
				<i class="fa-solid fa-users fa-lg"></i>
				<div class="info">Thành viên</div>
			</div>

			<div class="item item-chart url">
				<i class="fa-solid fa-code-merge fa-lg"></i>
				<div class="info">Nhóm</div>
			</div>

			<div class="item">
				<i class="fa-sharp fa-solid fa-triangle fa-lg"></i>
				<div class="info">TK Khách</div>
			</div>

			<div class="item">
				<i class="fa-solid fa-browser fa-lg"></i>
				<div class="info">Ứng dụng</div>
			</div>

			<div class="item" title="Đăng xuất" onclick=<?php echo "location.href=" . "\"logout?token=" . $logoutToken . "\""?>>
				<i class="fa-solid fa-power-off fa-lg"></i>
				<div class="info">Đăng xuất</div>
			</div>

		</div>

		{{content}}

		<div id="right-panel">
			<div class="userinfo">
				<div class="name">Đình Đức Lâm</div>
				<div class="info" title="lam.dinh@platform.inc">
					@lamdinh &nbsp;·&nbsp; lam.dinh@platform.inc
				</div>
			</div>
			<div class="title">
				Thông tin tài khoản
			</div>
			<div class="box">
				<div class="row active">
					<i class="fa-solid fa-gear"></i>
					<div class="name">
						Tài khoản
					</div>
				</div>

				<div class="row">
					<i class="fa-solid fa-pen"></i>
					<div class="name">
						Chỉnh sửa
					</div>
				</div>
				<div class="row">
					<i class="fa-solid fa-compass"></i>
					<div class="name">
						Ngôn ngữ
					</div>
				</div>
				<div class="row">
					<i class="fa-solid fa-circle-exclamation"></i>
					<div class="name">
						Đổi mật khẩu
					</div>
				</div>
				<div class="row">
					<i class="fa-solid fa-palette"></i>
					<div class="name">
						Đổi màu hiển thị
					</div>
				</div>
				<div class="row">
					<i class="fa-solid fa-clock"></i>
					<div class="name">
						Lịch làm việc
					</div>
				</div>
				<div class="row">
					<i class="fa-solid fa-shield"></i>
					<div class="name">
						Bảo mật 2 lớp
					</div>
				</div>
			</div>

			<div class="title">
				Ứng dụng - bảo mật
			</div>

			<div class="title">
				Tùy chỉnh nâng cao
			</div>

			<div class="box">
				<div class="row">
					<i class="fa-solid fa-clock"></i>
					<div class="name">Lịch sử đăng nhập</div>
				</div>
				<div class="row">
					<i class="fa-sharp fa-solid fa-desktop"></i>
					<div class="name">Quản lý thiết bị</div>
				</div>
				<div class="row">
					<i class="fa-solid fa-envelope"></i>
					<div class="name">Tùy chỉnh email thông báo</div>
				</div>
				<div class="row">
					<i class="fa-solid fa-clock"></i>
					<div class="name">Chỉnh sửa múi giờ</div>
				</div>
				<div class="row">
					<i class="fa-solid fa-share-nodes"></i>
					<div class="name">Ủy quyền tạm thời</div>
				</div>
			</div>

		</div>

	<div id="dialog">
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
				<button class="submit" type="submit">Cập nhật</button>
			</div>
		</form>
	</div>
	</body>
</html>
