<?php include "../header/header.php"; ?>

<h3>Transaksi Pembayaran SPP</h3>

<h3>Tagihan SPP Siswa</h3>
<table border="1">
	<tr>
		<th>No</th>
		<th>Nis</th>
		<th>Nama</th>
		<th>Kelas</th>
		<th>Wali Kelas</th>
		<th>status</th>
		<th>Tanggal</th>
		<th>Admin</th>
	</tr>

	<?php
	include "../connection/connection.php";
	$sql = mysqli_query($conn, "SELECT a.*, b.*, c.*, d.* FROM transaksi as a inner join student as b on a.nis = b.nis right join current_spp as c on a.nis = c.nis right join wclass as d on b.class = d.class where d.class in (b.class)");
	echo mysqli_error($conn);
	$no=1;
	while($d=mysqli_fetch_array($sql)){
		echo "<tr>
			<td>$no</td>
			<td>$d[nis]</td>
			<td>$d[student_name]</td>
			<td>$d[class]</td>
			<td>$d[fullname]</td>
			<td>$d[current_status]</td>
			<td>$d[tanggal]</td>
			<td>$d[admin]</td>
		</tr>";
		$no++;
	}
	?>
</table>

<p>Pembayaran SPP dilakukan dengan cara mencari tagihan siswa dengan NIS melalui form di atas, kemudian proses pembayaran</p>

<?php include "../footer/footer.php"; ?>