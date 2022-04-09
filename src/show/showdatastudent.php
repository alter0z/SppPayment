<?php include "../header/header.php"; ?>

<h3>Data Siswa</h3>
<a href="../add/addstudent.php">Tambah Data</a>
<table border="1">
	<tr>
		<th>No.</th>
		<th>NIS</th>
		<th>Nama Siswa</th>
		<th>Kelas</th>
		<th>Wali Kelas</th>
		<th>Tahun Ajaran</th>
		<th>Act</th>
	</tr>

	<?php 
		include "../connection/connection.php";
		$getData = mysqli_query($conn,"SELECT a.*, b.fullname FROM student as a inner join wclass as b on a.class = b.class order by class asc");

		$no=1;
		while($data = mysqli_fetch_array($getData)){
			echo "<tr>
				<td>$no</td>
				<td>$data[nis]</td>
				<td>$data[student_name]</td>
				<td>$data[class]</td>
				<td>$data[fullname]</td>
				<td>$data[periode]</td>
				<td>
					<a href='../edit/editstudent.php?nis=$data[nis]'>Edit</a> /
					<a href='../delete/deletestudent.php?nis=$data[nis]'>Hapus</a>
				</td>
			</tr>";
			$no++;
		}
	?>
</table>

<p>Menghapus siswa berarti juga menghapus tagihan siswa...</p>

<?php include "../footer/footer.php"; ?>