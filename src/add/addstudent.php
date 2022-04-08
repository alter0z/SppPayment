<?php include "../header/header.php"; ?>

<h3>Tambah Data Siswa</h3>
<form method="post">
	<div class="input-field">
			<input type="number" name="nis" id="add-nis" maxlength="40" placeholder="NIS ex: 2212345xxx" />
	</div>
	<br />
	<div class="input-field">
			<input type="text" name="studentname" id="add-ns" placeholder="Nama Siswa ex: Ratna Permata" />
	</div>
	<br />
	<div class="drop-down">
			<select name="class" id="add-class">
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
			<input type="datetime-local" name="duedate" />
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