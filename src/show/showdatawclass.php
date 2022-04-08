<?php include "../header/header.php"; ?>

<h3>Data Kelas dan Wali Kelas</h3>
<a href="tambah_walikelas.php">Tambah Data</a>
<table border="1">
	<tr>
		<th>No.</th>
		<th>Kelas</th>
		<th>Nama Wali Kelas</th>
		<th>act</th>
	</tr>
<?php
	include "../connection/connection.php";
	$getData = mysqli_query($conn, "SELECT * FROM wclass");
	$no = 1;
	while($data = mysqli_fetch_array($getData)){
		echo "<tr>
			<td>$no</td>
			<td>$data[class]</td>
			<td>$data[fullname]</td>
			<td>
				<a href='edit_walikelas.php?class=$data[class]'>Edit</a> / 
				<a href='hapus_walikelas.php?class=$data[class]'>Hapus</a>
			</td>
		</tr>";
		$no++;
	}
?>
</table>

<?php include "../footer/footer.php"; ?>