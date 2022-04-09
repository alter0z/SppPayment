<!DOCTYPE html>
<html>
<head>
	<title>Login Aplikasi Pembayaran SPP</title>
</head>
<body>
	<h3>Tambah Data User</h3>
	<hr/>
	<form method="post" action="">
		<table>
      <tr>
				<td>Fullname</td>
				<td><input type="text" name="fullname" /></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" /></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" /></td>
			</tr>
			<tr>
				<td>Role</td>
				<td>
					<select name="role">
						<option value="null" selected>- Pilih Role -</option>
						<?php
							include "../connection/connection.php";
							$getRole = mysqli_query($conn, "SELECT * from roles");
							while($data = mysqli_fetch_array($getRole)){
						?>
							<option value="<?php echo $data['role']; ?>"><?php echo $data['role']; ?></option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Login" /></td>
			</tr>
		</table>
	</form>
	<?php include "../functions/get_add_user.php"; ?>
	</body>
</html>