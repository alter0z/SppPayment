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
<html lang="en">
  <head>
    <!-- recuired meta tag -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <title>Aplikasi Pembayaran SPP</title>
  </head>
  <body style="background-color: #fafafa">
    <nav class="navbar navbar-expand-lg navbar-light bg-white m-3 shadow p-2" style="border-radius: 13px">
      <div class="container-fluid">
        <a class="navbar-brand" href="#" style="color: #2196f3">SppPayments</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index/admin.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../show/showdatauser.php">Data User</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../show/showdatawclass.php">Data Wali Kelas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../show/showdatastudent.php">Data Siswa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../show/showdataspp.php">Data SPP</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="transaksi.php">Transaksi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../auth/logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </body>
</html>
