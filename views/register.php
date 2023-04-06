
<div id="wrapper">
	<form action="" method="POST" id="form-login">
		<div class="login-row">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $model->email ?? '' ?>" class="form-input" placeholder="Your email">
		</div>

		<div class="login-row">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $model->username ?? '' ?>" class="form-input" placeholder="Your username">
		</div>

		<div class="login-row">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $model->name ?? '' ?>" class="form-input" placeholder="Your name">
		</div>

		<div class="login-row">
			<label>Password</label>
			<input type="password" name="password" class="form-input" placeholder="Your password">
		</div>

		<div class="login-row">
			<label>Confirm password</label>
			<input type="password" name="confirmPassword" class="form-input" placeholder="Your password">
		</div>

		<input type="submit" value="Đăng ký" class="form-submit">
	</form>

	<?php if (isset($model->error) && $model->error != '') : ?>
		<script>
			alert("<?php echo $model->error ?>")
		</script>
	<?php endif; ?>


</div>


