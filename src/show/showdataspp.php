<?php include "../header/header.php"; ?>

<h3>Data SPP</h3>
<table border="1">
	<tr>
		<th>No.</th>
		<th>NIS</th>
		<th>Nama Siswa</th>
		<th>Kelas</th>
		<th>Wali Kelas</th>
		<th>Tahun Ajaran</th>
		<th>Biaya</th>
		<th>Jatuh Tempo</th>
		<th>Act</th>
	</tr>

	<?php 
		include "../connection/connection.php";
		$getData = mysqli_query($conn,"SELECT a.*, b.*, c.fullname FROM student as a inner join spp as b on a.nis = b.nis right join wclass as c on a.class = c.class order by a.student_name asc");
		$no=1;
		while ($data = mysqli_fetch_array($getData)) {
			$date = date('D, M Y',strtotime($data['duedate']));
			echo "<tr>
				<td>$no</td>
				<td>$data[nis]</td>
				<td>$data[student_name]</td>
				<td>$data[class]</td>
				<td>$data[fullname]</td>
				<td>$data[periode]</td>
				<td>$data[spp_cost]</td>
				<td>$date</td>
				<td>
					<a href='edit_siswa.php?nis=$data[nis]'>Edit</a> /
					<a href='hapus_siswa.php?nis=$data[nis]'>Hapus</a>
				</td>
			</tr>";
			$no++;
		}
	?>
</table>

<p>Menghapus siswa berarti juga menghapus tagihan siswa...</p>

<?php include "../footer/footer.php"; ?>