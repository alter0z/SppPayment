<?php include "../header/headerw.php"; ?>

<h3>Data Tagihan Siswa</h3>
<table border="1">
	<tr>
		<th>No.</th>
		<th>NIS</th>
		<th>Nama Siswa</th>
		<th>Kelas</th>
		<th>Wali Kelas</th>
		<th>Tahun Ajaran</th>
		<th>Jatuh tempo</th>
		<th>Biaya</th>
		<th>Status</th>
	</tr>

	<?php 
		include "../connection/connection.php";

		$getWclas = $_SESSION['wclass'];

		$getData = mysqli_query($conn,"SELECT a.*, b.fullname, c.* FROM student as a inner join wclass as b on a.class = b.class right join spp as c on a.nis = c.nis where b.fullname = '$getWclas' and month(c.duedate) = month(now()) order by a.student_name asc");

		$no=1;
		while($data = mysqli_fetch_array($getData)){
			echo "<tr>
				<td>$no</td>
				<td>$data[nis]</td>
				<td>$data[student_name]</td>
				<td>$data[class]</td>
				<td>$data[fullname]</td>
				<td>$data[periode]</td>
				<td>$data[duedate]</td>
				<td>$data[spp_cost]</td>
				<td>$data[status]</td>
			</tr>";
			$no++;
		}
	?>
</table>

<h3>Data Transaksi Siswa</h3>
<table border="1">
<tr>
	<th style="width: 80px"><strong>#</strong></th>
	<th><strong>NIS</strong></th>
	<th><strong>Nama</strong></th>
	<th><strong>Kelas</strong></th>
	<th><strong>Jenis Kelamin</strong></th>
	<th><strong>Wali Kelas</strong></th>
	<th><strong>Status</strong></th>
	<th><strong>Tanggal</strong></th>
	<th><strong>Admin</strong></th>
</tr>

	<?php 
		include "../connection/connection.php";

		$getWclas = $_SESSION['wclass'];

		$getData = mysqli_query($conn,"SELECT a.*, b.*, c.* FROM transaksi as a join student as b on a.nis = b.nis join wclass as c on b.class = c.class where c.fullname = '$getWclas' order by b.student_name asc");

		$no=1;
		while($d=mysqli_fetch_array($getData)){
			$date = date('D, d M Y h:i a',strtotime($d['tanggal']));
			echo "<tr>
			<td>$no</td>
			<td>$d[nis]</td>
			<td>$d[student_name]</td>
			<td>$d[class]</td>
			<td>$d[jenis_kelamin]</td>
			<td>$d[fullname]</td>
			<td>$d[spp_status]</td>
			<td>$date</td>
			<td>$d[admin]</td>
			</tr>";
			$no++;
		}
	?>
</table>

<p>Menghapus siswa berarti juga menghapus tagihan siswa...</p>

<?php include "../footer/footer.php"; ?>