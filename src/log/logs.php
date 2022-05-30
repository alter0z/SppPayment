<?php include "../header/header.php"; ?>

<!-- user -->

<h3>Log add user</h3>
<table border="1">
	<tr>
		<th>No</th>
		<th>Name</th>
		<th>Username</th>
		<th>Role</th>
		<th>Password</th>
		<th>status</th>
		<th>Tanggal</th>
		<th>Admin</th>
	</tr>

	<?php
	include "../connection/connection.php";
	$sql = mysqli_query($conn, "SELECT*from log_user where status = 'Memasukkan Data User' order by tanggal asc");
	echo mysqli_error($conn);
	$no=1;
	while($d=mysqli_fetch_array($sql)){
    // $date = date('D, d M Y',strtotime($d['date']));
		echo "<tr>
			<td>$no</td>
			<td>$d[new_name]</td>
			<td>$d[new_username]</td>
			<td>$d[new_role]</td>
			<td>$d[new_password]</td>
			<td>$d[status]</td>
			<td>$d[tanggal]</td>
			<td>$d[admin]</td>
		</tr>";
		$no++;
	}
	?>
</table>
<br>

<h3>Log edit user</h3>
<table border="1">
	<tr>
		<th>No</th>
		<th>OName</th>
		<th>NName</th>
		<th>OUsername</th>
		<th>NUsername</th>
		<th>ORole</th>
		<th>NRole</th>
		<th>OPassword</th>
		<th>NPassword</th>
		<th>status</th>
		<th>Tanggal</th>
		<th>Admin</th>
	</tr>

	<?php
	include "../connection/connection.php";
	$sql = mysqli_query($conn, "SELECT*from log_user where status = 'Merubah Data User' order by tanggal asc");
	echo mysqli_error($conn);
	$no=1;
	while($d=mysqli_fetch_array($sql)){
    // $date = date('D, d M Y',strtotime($d['date']));
		echo "<tr>
			<td>$no</td>
			<td>$d[old_name]</td>
			<td>$d[new_name]</td>
			<td>$d[old_username]</td>
			<td>$d[new_username]</td>
			<td>$d[old_role]</td>
			<td>$d[new_role]</td>
			<td>$d[old_password]</td>
			<td>$d[new_password]</td>
			<td>$d[status]</td>
			<td>$d[tanggal]</td>
			<td>$d[admin]</td>
		</tr>";
		$no++;
	}
	?>
</table>
<br>

<h3>Log delete user</h3>
<table border="1">
	<tr>
		<th>No</th>
		<th>Name</th>
		<th>Username</th>
		<th>Role</th>
		<th>Password</th>
		<th>status</th>
		<th>Tanggal</th>
		<th>Admin</th>
	</tr>

	<?php
	include "../connection/connection.php";
	$sql = mysqli_query($conn, "SELECT*from log_user where status = 'Menghapus Data User' order by tanggal asc");
	echo mysqli_error($conn);
	$no=1;
	while($d=mysqli_fetch_array($sql)){
    // $date = date('D, d M Y',strtotime($d['date']));
		echo "<tr>
			<td>$no</td>
			<td>$d[old_name]</td>
			<td>$d[old_username]</td>
			<td>$d[old_role]</td>
			<td>$d[old_password]</td>
			<td>$d[status]</td>
			<td>$d[tanggal]</td>
			<td>$d[admin]</td>
		</tr>";
		$no++;
	}
	?>
</table>
<br>

<!-- student -->

<h3>Log add student</h3>
<table border="1">
	<tr>
		<th>No</th>
		<th>Name</th>
		<th>Calss</th>
		<th>Period</th>
		<th>Duedate</th>
		<th>Cost</th>
		<th>status</th>
		<th>Tanggal</th>
		<th>Admin</th>
	</tr>

	<?php
	include "../connection/connection.php";
	$sql = mysqli_query($conn, "SELECT*from log_student where status = 'Memasukkan Data Siswa' order by tanggal asc");
	echo mysqli_error($conn);
	$no=1;
	while($d=mysqli_fetch_array($sql)){
    // $date = date('D, d M Y',strtotime($d['date']));
		echo "<tr>
			<td>$no</td>
			<td>$d[new_name]</td>
			<td>$d[new_class]</td>
			<td>$d[new_period]</td>
			<td>$d[new_spp_cost]</td>
			<td>$d[status]</td>
			<td>$d[tanggal]</td>
			<td>$d[admin]</td>
		</tr>";
		$no++;
	}
	?>
</table>
<br>

<h3>Log edit student</h3>
<table border="1">
	<tr>
  <th>No</th>
		<th>OName</th>
		<th>NName</th>
		<th>OCalss</th>
		<th>NCalss</th>
		<th>OPeriod</th>
		<th>NPeriod</th>
		<th>ODuedate</th>
		<th>NDuedate</th>
		<th>OCost</th>
		<th>NCost</th>
		<th>status</th>
		<th>Tanggal</th>
		<th>Admin</th>
	</tr>

	<?php
	include "../connection/connection.php";
	$sql = mysqli_query($conn, "SELECT*from log_student where status = 'Merubah Data Siswa' order by tanggal asc");
	echo mysqli_error($conn);
	$no=1;
	while($d=mysqli_fetch_array($sql)){
    // $date = date('D, d M Y',strtotime($d['date']));
		echo "<tr>
    <td>$no</td>
			<td>$d[old_name]</td>
			<td>$d[new_name]</td>
			<td>$d[old_class]</td>
			<td>$d[new_class]</td>
			<td>$d[old_period]</td>
			<td>$d[new_period]</td>
			<td>$d[old_spp_cost]</td>
			<td>$d[new_spp_cost]</td>
			<td>$d[status]</td>
			<td>$d[tanggal]</td>
			<td>$d[admin]</td>
		</tr>";
		$no++;
	}
	?>
</table>
<br>

<h3>Log delete student</h3>
<table border="1">
	<tr>
    <th>No</th>
		<th>Name</th>
		<th>Calss</th>
		<th>Period</th>
		<th>Duedate</th>
		<th>Cost</th>
		<th>status</th>
		<th>Tanggal</th>
		<th>Admin</th>
	</tr>

	<?php
	include "../connection/connection.php";
	$sql = mysqli_query($conn, "SELECT*from log_student where status = 'Menghapus Data Siswa' order by tanggal asc");
	echo mysqli_error($conn);
	$no=1;
	while($d=mysqli_fetch_array($sql)){
    // $date = date('D, d M Y',strtotime($d['date']));
		echo "<tr>
      <td>$no</td>
      <td>$d[old_name]</td>
      <td>$d[old_class]</td>
      <td>$d[old_period]</td>
      <td>$d[old_spp_cost]</td>
      <td>$d[status]</td>
      <td>$d[tanggal]</td>
      <td>$d[admin]</td>
		</tr>";
		$no++;
	}
	?>
</table>
<br>

<!-- wclass -->

<h3>Log add wcalss</h3>
<table border="1">
	<tr>
		<th>No</th>
		<th>Name</th>
		<th>class</th>
		<th>status</th>
		<th>Tanggal</th>
		<th>Admin</th>
	</tr>

	<?php
	include "../connection/connection.php";
	$sql = mysqli_query($conn, "SELECT*from log_wclass where status = 'Memasukkan Data Walikelas' order by tanggal asc");
	echo mysqli_error($conn);
	$no=1;
	while($d=mysqli_fetch_array($sql)){
    // $date = date('D, d M Y',strtotime($d['date']));
		echo "<tr>
			<td>$no</td>
			<td>$d[new_name]</td>
			<td>$d[new_class]</td>
			<td>$d[status]</td>
			<td>$d[tanggal]</td>
			<td>$d[admin]</td>
		</tr>";
		$no++;
	}
	?>
</table>
<br>

<h3>Log edit wclass</h3>
<table border="1">
	<tr>
    <th>No</th>
		<th>OName</th>
		<th>NName</th>
		<th>Oclass</th>
		<th>Nclass</th>
		<th>status</th>
		<th>Tanggal</th>
		<th>Admin</th>
	</tr>

	<?php
	include "../connection/connection.php";
	$sql = mysqli_query($conn, "SELECT*from log_wclass where status = 'Merubah Data Walikelas' order by tanggal asc");
	echo mysqli_error($conn);
	$no=1;
	while($d=mysqli_fetch_array($sql)){
    // $date = date('D, d M Y',strtotime($d['date']));
		echo "<tr>
      <td>$no</td>
      <td>$d[old_name]</td>
      <td>$d[new_name]</td>
      <td>$d[old_class]</td>
      <td>$d[new_class]</td>
      <td>$d[status]</td>
      <td>$d[tanggal]</td>
      <td>$d[admin]</td>
		</tr>";
		$no++;
	}
	?>
</table>
<br>

<h3>Log delete wclass</h3>
<table border="1">
	<tr>
    <th>No</th>
		<th>Name</th>
		<th>class</th>
		<th>status</th>
		<th>Tanggal</th>
		<th>Admin</th>
	</tr>

	<?php
	include "../connection/connection.php";
	$sql = mysqli_query($conn, "SELECT*from log_wclass where status = 'Menghapus Data Walikelas' order by tanggal asc");
	echo mysqli_error($conn);
	$no=1;
	while($d=mysqli_fetch_array($sql)){
    // $date = date('D, d M Y',strtotime($d['date']));
		echo "<tr>
      <td>$no</td>
      <td>$d[old_name]</td>
      <td>$d[old_class]</td>
      <td>$d[status]</td>
      <td>$d[tanggal]</td>
      <td>$d[admin]</td>
		</tr>";
		$no++;
	}
	?>
</table>

<?php include "../footer/footer.php"; ?>