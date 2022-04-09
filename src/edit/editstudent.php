<?php include "../header/header.php"; ?>

<?php
	include "../connection/connection.php";

	$getData = mysqli_query($conn, "SELECT * FROM student WHERE nis='$_GET[nis]'");
	$data = mysqli_fetch_array($getData);

	$getDataSpp = mysqli_query($conn, "SELECT * FROM spp WHERE nis='$_GET[nis]'");
	$dataSpp = mysqli_fetch_array($getDataSpp);
?>

<h3>Edit Data Siswa</h3>

<form method="POST">
	<div class="input-field">
			<input type="number" name="getnis" maxlength="6" value="<?php echo $data['nis']; ?>" placeholder="NIS ex: 2212345xxx" />
	</div> 
	<br />
	<div class="input-field">
			<input type="text" name="studentname" value="<?php echo $data['student_name']; ?>" placeholder="Nama Siswa ex: Ratna Permata" />
	</div>
	<br />
	<div class="drop-down">
			<select name="class" id="add-class">
				<?php
					include "../connection/connection.php";

					$getDatac = mysqli_query($conn, "SELECT * from wclass order by class ASC");
					while($datac = mysqli_fetch_array($getDatac)){

						if($datac['class'] == $data['class']){
							$selected = "selected";
						}else{
							$selected ="";
						}

				?>
					<option value="<?php echo $datac['class']; ?>" <?php echo $selected; ?>><?php echo $datac['class']; ?></option>
				<?php
					}
				?>
			</select>
	</div>
	<br />
	<div class="input-field">
			<input type="text" name="periode" value="<?php echo $data['periode']; ?>" id="add-ta" />
	</div>
	<br />
	<div class="input-field">
			<input type="text" name="sppcost" value="<?php echo $dataSpp['spp_cost']; ?>" id="add-spp" />
	</div>
	<br />
	<div class="input-field">
			<input type="date" name="duedate" value="<?php echo $dataSpp['duedate']; ?>" />
	</div>
	<br />
	<div class="input-field">
			<input type="text" name="status" value="<?php echo $dataSpp['status']; ?>" style="display: none;" id="add-t" readonly />
	</div>
	<br />
	<input type="submit" value="Simpan" />
</form>

<?php include "../functions/get_edit_student.php" ?>

<?php include "../footer/footer.php" ?>