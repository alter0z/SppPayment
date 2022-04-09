<?php include "../header/header.php"; ?>

<h3>Data User</h3>
<a href="../add/adduser.php">Tambah Data</a>
<table border="1">
	<tr>
		<th>No</th>
		<th>Name</th>
		<th>Username</th>
		<th>Role</th>
		<th>Aksi</th>
	</tr>
	<?php
		include "../connection/connection.php";

		$getData=mysqli_query($conn, "SELECT * FROM user ORDER BY name ASC");
		$no=1;
		while($data = mysqli_fetch_array($getData)){
			echo "<tr>
				<td>$no</td>
				<td>$data[name]</td>
				<td>$data[username]</td>
				<td>$data[role]</td>
				<td>
					<a href='../edit/edituser.php?username=$data[username]'>Edit</a> /
					<a href='../delete/deleteuser.php?username=$data[username]'>Hapus</a>
				</td>
			</tr>";
			$no++;
		}
	?>
</table>

<?php include "../footer/footer.php"; ?>