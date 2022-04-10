<?php
	session_start();
	if (!isset($_SESSION['login'])) {
		header('location:../auth/login.php');
	} else {
		if (isset($_SESSION['login']) && $_SESSION['role'] == "walikelas") {
			header('location:../index/wclass.php');
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi Pembayaran SPP</title>
</head>
<body>
<h3>Aplikasi Pembayaran SPP</h3>
<hr/>
<a href="../index/admin.php">Dashboard</a> |
<a href="../show/showdatauser.php">Data User</a> |
<a href="../show/showdatawclass.php">Data Wali Kelas</a> |
<a href="../show/showdatastudent.php">Data Siswa</a> |
<a href="../show/showdataspp.php">Data SPP</a> |
<a href="transaksi.php">Transaksi</a> |
<a href="../auth/logout.php">Logout</a>
<hr/>