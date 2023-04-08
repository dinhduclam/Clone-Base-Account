<form action="" method="POST" id="form-login">
	<div class="auth-title">
		<h1>Login</h1>
		<p>Welcome back. Login to start working.</p>
	</div>
	<div class="main-form">
		<div class="login-row">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email ?? '' ?>" class="form-input" placeholder="Your email">
		</div>

		<div class="login-row">
			<label>Password</label>
			<input type="password" name="password" class="form-input" placeholder="Your password">
		</div>

		<div class="login-row">
			<input type="checkbox">
			Keep me logged in
		</div>

		<input type="submit" value="Login to start working" class="form-submit">
	</div>
</form>
