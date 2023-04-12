<!DOCTYPE HTML>
<html>
	<head>
		<title>Login - Base Account</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<link rel="shortcut icon" href="../../public/img/fav.png" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:500,400,300,400italic,700,700italic,400italic,300italic&subset=vietnamese,latin">
		<link rel="stylesheet" type="text/css" href="../../public/css/app.css">
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="../../public/js/auth.js"></script>
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	</head>

	<body>
		<div id='master'>
			<div id='auth' class='scrollable' data-autoscroll='1' data-autohide='1'>
				<div class='box-wrap'>
					<div class='auth-logo'>
						<a href='https://base.vn'>
							<img src='https://share-gcdn.basecdn.net/brand/logo.full.png' />
						</a>
					</div>
					{{content}}
				</div>
			</div>
		</div>

		<?php if ($hasError ?? false) : ?>
			<div id="dialog-alert">
				<div class="background"></div>
				<div class="wrapper">
					<div class="content">
						<span><?php echo $error ?? ''?></span>
						<div class="close-button" onclick="closeDialog();">x</div>
					</div>
					<div class="confirm-button" onclick="closeDialog();">OK</div>
				</div>
			</div>
		<?php endif; ?>
	</body>

</html>
