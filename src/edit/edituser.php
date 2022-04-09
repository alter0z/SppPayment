<?php include "../header/header.php"; ?>

<?php
	include "../connection/connection.php";

	$getData = mysqli_query($conn, "SELECT * FROM user WHERE username='$_GET[username]'");
	$data = mysqli_fetch_array($getData);
?>

<h3>Edit Data User</h3>

<form method="POST">
	<div class="input-field">
			<input type="text" name="name" value="<?php echo $data['name']; ?>" />
	</div> 
	<br />
	<div class="input-field">
			<input type="text" name="username" value="<?php echo $data['username']; ?>" />
	</div>
	<br />
	<div class="drop-down">
			<select name="role">
				<?php
					include "../connection/connection.php";

					$getDatac = mysqli_query($conn, "SELECT * from roles");
					while($datac = mysqli_fetch_array($getDatac)){

						if($datac['role'] == $data['role']){
							$selected = "selected";
						}else{
							$selected ="";
						}

				?>
					<option value="<?php echo $datac['role']; ?>" <?php echo $selected; ?>><?php echo $datac['role']; ?></option>
				<?php
					}
				?>
			</select>
	</div>
	<br />
	<div class="input-field">
			<input type="password" name="password" value="<?php echo $data['password']; ?>" />
	</div>
	<input type="submit" value="Simpan" />
</form>

<?php include "../functions/get_edit_user.php" ?>

<?php include "../footer/footer.php" ?>