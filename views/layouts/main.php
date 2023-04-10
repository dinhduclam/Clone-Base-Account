<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:500,400,300,400italic,700,700italic,400italic,300italic&subset=vietnamese,latin">
	<link rel="stylesheet" type="text/css" href="../../public/css/app.css">
	<title> <?php echo $fullname.' - Tài khoản - True Platform' ?> </title>
</head>
<body>
	<div id="left-panel">
		<div class="item">
			<div class="avatar">
				<img src="https://data-gcdn.basecdn.net/avatar/sys5407/36/94/f9/71/e2/5198e1f158f741ab122716c0c8924062/0.lamdinh_5407.jpg?ts=1681093410">
			</div>
		</div>

		<div class="item active" title="Tài khoản" data-url="account">
			<div class="icon">
				<span class="-ap icon-account_circle"></span>
			</div>
			<div class="info">Cá nhân</div>
		</div>

		<div class="item" title="Thông báo">
			<div class="icon">
				<span class="-ap icon-notifications"></span>
			</div>
			<div class="info">Thông báo</div>
		</div>

		<div class="item">
			<div class="icon">
				<span class="-ap icon-users"></span>
			</div>
			<div class="info">Thành viên</div>
		</div>

		<div class="item item-chart url">
			<div class="icon">
				<span class="-ap icon-flow-merge"></span>
			</div>
			<div class="info">Nhóm</div>
		</div>

		<div class="item">
			<div class="icon">
				<span class="-ap icon-change_history"></span>
			</div>
			<div class="info">TK Khách</div>
		</div>

		<div class="item">
			<div class="icon">
				<span class="-ap icon-turned_in_not"></span>
			</div>
			<div class="info">Ứng dụng</div>
		</div>

		<div class="item" title="Đăng xuất" data-url="logout">
			<div class="icon">
				<span class="-ap icon-power_settings_new"></span>
			</div>
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
				<div class="icon">
					<span class="-ap icon-gear"></span>
				</div>
				<div class="name">
					Tài khoản
				</div>
			</div>

			<div class="row">
				<div class="icon">
					<span class="-ap icon-gear"></span>
				</div>
				<div class="name">
					Chỉnh sửa
				</div>
			</div>
			<div class="row">
				<div class="icon">
					<span class="-ap icon-gear"></span>
				</div>
				<div class="name">
					Ngôn ngữ
				</div>
			</div>
			<div class="row">
				<div class="icon">
					<span class="-ap icon-gear"></span>
				</div>
				<div class="name">
					Đổi mật khẩu
				</div>
			</div>
			<div class="row">
				<div class="icon">
					<span class="-ap icon-gear"></span>
				</div>
				<div class="name">
					Đổi màu hiển thị
				</div>
			</div>
			<div class="row">
				<div class="icon">
					<span class="-ap icon-gear"></span>
				</div>
				<div class="name">
					Lịch làm việc
				</div>
			</div>
			<div class="row">
				<div class="icon">
					<span class="-ap icon-gear"></span>
				</div>
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
				<div class="icon">
					<span class="-ap icon-gear"></span>
				</div>
				<div class="name">Lịch sử đăng nhập</div>
			</div>
			<div class="row">
				<div class="icon">
					<span class="-ap icon-gear"></span>
				</div>
				<div class="name">Quản lý thiết bị</div>
			</div>
			<div class="row">
				<div class="icon">
					<span class="-ap icon-gear"></span>
				</div>
				<div class="name">Tùy chỉnh email thông báo</div>
			</div>
			<div class="row">
				<div class="icon">
					<span class="-ap icon-gear"></span>
				</div>
				<div class="name">Chỉnh sửa múi giờ</div>
			</div>
			<div class="row">
				<div class="icon">
					<span class="-ap icon-gear"></span>
				</div>
				<div class="name">Ủy quyền tạm thời</div>
			</div>
		</div>

	</div>
</body>
</html>
