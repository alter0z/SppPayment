<?php
  include "../connection/connection.php";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$username = $_POST['username'];
    $password = $_POST['password'];
    
		
		if ($username == '' || $password == '') {
			header('location:../auth/login.php?message=empty');
		} else {
			$login = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password' ");
			$check = mysqli_num_rows($login);

			if ($check > 0) {
				session_start();
				$data = mysqli_fetch_assoc($login);

				if ($data['role'] == "admin") {
					$_SESSION['login'] = true;
					$_SESSION['fullname'] = $data['name'];
					$_SESSION['username'] = $username;
					$_SESSION['role'] = $data['role'];

					header('location:../index/admin.php?message=success');
					die();
					// echo $role;
				} else if ($data['role'] == "walikelas") {
					$_SESSION['login'] = true;
					$_SESSION['username'] = $username;
					$_SESSION['role'] = $data['role'];
					$_SESSION['wclass'] = $data['name'];

					header('location:../show/showdatastudent.bywclass.php?message=success');
					die();
				}
			} else {
				header('location:../auth/login.php?message=failed');
			}
		}
	}
?>