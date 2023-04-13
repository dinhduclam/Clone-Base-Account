
<div id="wrapper">
	<form action="" method="POST" id="form-auth">
		<div class="auth-row">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email ?? '' ?>" class="form-input" placeholder="Your email">
		</div>

		<div class="auth-row">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username ?? '' ?>" class="form-input" placeholder="Your username">
		</div>

		<div class="auth-row">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name ?? '' ?>" class="form-input" placeholder="Your name">
		</div>

		<div class="auth-row">
			<label>Password</label>
			<input type="password" name="password" class="form-input" placeholder="Your password">
		</div>

		<div class="auth-row">
			<label>Confirm password</label>
			<input type="password" name="confirmPassword" class="form-input" placeholder="Your password">
		</div>

		<input type="submit" value="Đăng ký" class="form-submit">
	</form>
</div>


