<?php include "../header/header.php"; ?>

<?php
	include "../connection/connection.php";

	$getData = mysqli_query($conn, "SELECT * FROM wclass WHERE class='$_GET[class]'");
	$data = mysqli_fetch_array($getData);
?>

<h3>Edit data Wali Kelas</h3>
<form method="POST">
	<select name="class" id="add-wclass">
		<option value="null">Pilih Kelas</option>
		<option value="10-A">10-A</option>
		<option value="10-B">10-B</option>
		<option value="10-C">10-C</option>
		<option value="10-D">10-D</option>
		<option value="10-E">10-E</option>
		<option value="10-F">10-F</option>
		<option value="11-A">11-A</option>
		<option value="11-B">11-B</option>
		<option value="11-C">11-C</option>
		<option value="11-D">11-D</option>
		<option value="11-E">11-E</option>
		<option value="11-F">11-F</option>
		<option value="12-A">12-A</option>
		<option value="12-B">12-B</option>
		<option value="12-C">12-C</option>
		<option value="12-D">12-D</option>
		<option value="12-E">12-E</option>
		<option value="12-F">12-F</option>
	</select>
	<br />
	<br />
	<input type="text" name="fullname" value="<?php echo $data['fullname']; ?>" />
	<input type="submit" name="Simpan" value="Simpan" />
</form>

<?php include "../functions/get_edit_wclass.php" ?>

<?php include "../footer/footer.php"; ?>