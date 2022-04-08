<!DOCTYPE html>
<html>
<head>
	<title>Login Aplikasi Pembayaran SPP</title>
</head>
<body>
	<h3>Silahkan Login Menggunakan Username dan Password Anda</h3>
	<hr/>
	<form method="post" action="">
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" /></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Login" /></td>
			</tr>
		</table>
	</form>
	<?php include "../functions/get_login.php"; ?>
	</body>
</html>