<?php include "../header/header.php"; ?>

<h3>Tambah Data Siswa</h3>
<form method="post">
	<div class="input-field">
			<input type="number" name="nis" id="add-nis" maxlength="6" placeholder="NIS ex: 2212345xxx" />
	</div>
	<br />
	<div class="input-field">
			<input type="text" name="studentname" id="add-ns" placeholder="Nama Siswa ex: Ratna Permata" />
	</div>
	<br />
	<div class="drop-down">
			<select name="class" id="add-class">
			<option value="null" selected>- Pilih Kelas -</option>
				<?php
					include "../connection/connection.php";
					$getClass = mysqli_query($conn, "SELECT class from wclass order by class asc");
					while($data = mysqli_fetch_array($getClass)){
				?>
						<option value="<?php echo $data['class']; ?>"><?php echo $data['class']; ?></option>
				<?php
					}
				?>
			</select>
	</div>
	<br />
	<div class="input-field">
			<input type="text" name="periode" value="2021-2022" style="display: none;" id="add-ta" readonly />
	</div>
	<br />
	<div class="input-field">
			<input type="text" name="sppcost" value="250000" style="display: none;" id="add-spp" readonly />
	</div>
	<br />
	<div class="input-field">
			<input type="date" name="duedate" />
	</div>
	<br />
	<div class="input-field">
			<input type="text" name="status" value="Belum Lunas" style="display: none;" id="add-t" readonly />
	</div>
	<br />
	<input type="submit" value="Simpan" />
</form>

<?php include "../functions/get_add_student.php"; ?>

<?php include "../footer/footer.php"; ?>