<form action="" method="POST" id="form-auth">
	<div class="auth-title">
		<h1>Register</h1>
		<p>Register to create new account.</p>
	</div>
	<div class="main-form">
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

		<div class="auth-row">
			<label>Captcha</label>
			<div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
		</div>

		<input type="submit" value="Register" class="form-submit">
	</div>

	<div class="page-link">
		Already have an account? <a href="/login">Login</a>
	</div>
</form>


