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

	<!-- icon tab -->
	<link rel="shortcut icon" type="image/png" href="../img/sp.png" />

	<!-- js -->
	<!-- <script src="
https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script> -->
	<!-- <script src="../js/script.js"></script> -->

    <title>Aplikasi Pembayaran SPP</title>
  </head>
  <body style="background-color: #fafafa">
  <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white mt-3 mb-3 me-4 ms-4 shadow p-2" style="border-radius: 13px">
      <div class="container-fluid">
		  <!-- brand -->
        <a class="navbar-brand" href="#" style="color: #2196f3">
			<svg width="51" height="40" viewBox="0 0 68 57" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2">
				<path d="M16.833 44.96C14.993 44.96 13.233 44.7 11.553 44.18C9.87305 43.66 8.33305 42.88 6.93305 41.84C5.53305 40.8 4.31305 39.54 3.27305 38.06C2.23305 36.54 1.41305 34.78 0.813047 32.78L8.43305 29.78C8.99305 31.94 9.97305 33.74 11.373 35.18C12.773 36.58 14.613 37.28 16.893 37.28C17.733 37.28 18.533 37.18 19.293 36.98C20.093 36.74 20.793 36.42 21.393 36.02C22.033 35.58 22.533 35.04 22.893 34.4C23.253 33.76 23.433 33.02 23.433 32.18C23.433 31.38 23.293 30.66 23.013 30.02C22.733 29.38 22.253 28.78 21.573 28.22C20.933 27.66 20.073 27.12 18.993 26.6C17.953 26.08 16.653 25.54 15.093 24.98L12.453 24.02C11.293 23.62 10.113 23.08 8.91305 22.4C7.75305 21.72 6.69305 20.9 5.73305 19.94C4.77305 18.98 3.97305 17.86 3.33305 16.58C2.73305 15.26 2.43305 13.78 2.43305 12.14C2.43305 10.46 2.75305 8.9 3.39305 7.46C4.07305 5.98 5.01305 4.7 6.21305 3.62C7.45305 2.5 8.91305 1.64 10.593 1.04C12.313 0.399997 14.213 0.0799968 16.293 0.0799968C18.453 0.0799968 20.313 0.379998 21.873 0.98C23.473 1.54 24.813 2.28 25.893 3.2C27.013 4.08 27.913 5.06 28.593 6.14C29.273 7.22 29.773 8.24 30.093 9.2L22.953 12.2C22.553 11 21.813 9.92 20.733 8.96C19.693 8 18.253 7.52 16.413 7.52C14.653 7.52 13.193 7.94 12.033 8.78C10.873 9.58 10.293 10.64 10.293 11.96C10.293 13.24 10.853 14.34 11.973 15.26C13.093 16.14 14.873 17 17.313 17.84L20.013 18.74C21.733 19.34 23.293 20.04 24.693 20.84C26.133 21.6 27.353 22.52 28.353 23.6C29.393 24.68 30.173 25.92 30.693 27.32C31.253 28.68 31.533 30.26 31.533 32.06C31.533 34.3 31.073 36.24 30.153 37.88C29.273 39.48 28.133 40.8 26.733 41.84C25.333 42.88 23.753 43.66 21.993 44.18C20.233 44.7 18.513 44.96 16.833 44.96ZM37.0048 14.6H44.3848V18.14H44.8648C45.5848 16.9 46.7048 15.84 48.2248 14.96C49.7448 14.08 51.6248 13.64 53.8648 13.64C55.7448 13.64 57.5248 14.04 59.2048 14.84C60.9248 15.6 62.4248 16.68 63.7048 18.08C65.0248 19.44 66.0648 21.08 66.8248 23C67.5848 24.92 67.9648 27.02 67.9648 29.3C67.9648 31.58 67.5848 33.68 66.8248 35.6C66.0648 37.52 65.0248 39.18 63.7048 40.58C62.4248 41.94 60.9248 43.02 59.2048 43.82C57.5248 44.58 55.7448 44.96 53.8648 44.96C51.6248 44.96 49.7448 44.52 48.2248 43.64C46.7048 42.76 45.5848 41.7 44.8648 40.46H44.3848L44.8648 44.66V56.96H37.0048V14.6ZM52.2448 37.7C53.2848 37.7 54.2648 37.5 55.1848 37.1C56.1448 36.7 56.9848 36.14 57.7048 35.42C58.4248 34.7 59.0048 33.82 59.4448 32.78C59.8848 31.74 60.1048 30.58 60.1048 29.3C60.1048 28.02 59.8848 26.86 59.4448 25.82C59.0048 24.78 58.4248 23.9 57.7048 23.18C56.9848 22.46 56.1448 21.9 55.1848 21.5C54.2648 21.1 53.2848 20.9 52.2448 20.9C51.2048 20.9 50.2048 21.1 49.2448 21.5C48.3248 21.86 47.5048 22.4 46.7848 23.12C46.0648 23.84 45.4848 24.72 45.0448 25.76C44.6048 26.8 44.3848 27.98 44.3848 29.3C44.3848 30.62 44.6048 31.8 45.0448 32.84C45.4848 33.88 46.0648 34.76 46.7848 35.48C47.5048 36.2 48.3248 36.76 49.2448 37.16C50.2048 37.52 51.2048 37.7 52.2448 37.7Z" fill="#2196F3"/>
			</svg>SppPayments</a>
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
              <a class="navclass" href="../show/showdataspp.php">Data SPP</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="transaksi.php">Transaksi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../auth/logout.php">Logout</a>
            </li>
          </ul>
        </div>
		<!-- <script>
			$(document).ready(function () {
  $("a").click(function () {
    $("a.navclass.active").removeClass("active");
    $(this).addClass("active");
  });
});

		</script> -->
      </div>
    </nav>
  </body>
</html>
