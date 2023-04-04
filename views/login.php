<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/app.css">
	<link rel="icon" href="./img/fav.png" type="image/x-icon">
    <title>Login - Base Account</title>
</head>
<body>
    <div id="wrapper">
        <form action="../controllers/login_controller.php" method="POST" id="form-login">
			<div class="login-row">
				<label>Email</label>
				<input type="email" name="email" class="form-input" placeholder="Your email">
			</div>

			<div class="login-row">
				<label>Password</label>
				<input type="password" name="password" class="form-input" placeholder="Your password">
			</div>

            <input type="submit" value="Đăng nhập" class="form-submit">
        </form>
    </div>

</body>
</html>