<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> <?php echo $lastname.' '.$firstname.' - Tài khoản - True Platform' ?> </title>
</head>
<body>
	<b>Tên đầy đủ:</b> <?php echo $fullname ?> <br>
	<b>Địa chỉ email:</b> <?php echo $title ?? 'Không có thông tin'?><br>
	<b>Địa chỉ email:</b> <?php echo $email ?? 'Không có thông tin'?><br>
	<b>Số điện thoại:</b> <?php echo $phone ?? 'Không có thông tin'?><br>
	<b>Địa chỉ:</b> <?php echo $address ?? 'Không có thông tin'?><br>
   	<a href="http://clone.account.com/logout">Logout</a><br>
</body>
</html>