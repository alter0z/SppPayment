<?php
  include "../connection/connection.php";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$username = $_POST['username'];
		$role = $_POST['role'];
		$password = $_POST['password'];
		
		if ($username == '' || $role = '' || $password == '') {
			echo "Form belum lengkap!!";
		} else {
			$login = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
			$check = mysqli_num_rows($login);
			if ($check > 0) {
				session_start();
				$data = mysqli_fetch_assoc($login);

				if ($data['role'] == "admin") {
					$_SESSION['login'] = true;
					$_SESSION['username'] = $username;
					$_SESSION['role'] = $role;

					header('location:../index/admin.php');
				}
			} else {
				echo "Username dan Password anda Salah!!!";
			}
		}
	}
?>