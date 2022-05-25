<?php 
  include "../connection/connection.php";

  // SET FOREIGN_KEY_CHECKS=0; -- to disable them
  // SET FOREIGN_KEY_CHECKS=1; -- to re-enable them

  if($_SERVER['REQUEST_METHOD']=='POST'){
		$name 	= $_POST['name'];
		$username 	= $_POST['username'];
		$role 	= $_POST['role'];
		$password 	= $_POST['password'];

		if ($name == '' || $username == '' || $role == '' || $password == '') {
			echo "Form belum lengkap...";
		} else {
      // mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");
      $update = mysqli_query($conn, "UPDATE user set name='$name', role='$role', username='$username', password='$password' where username='$_GET[username]'");

			session_start();

			if (!$update) {
				$_SESSION['message'] = 'failed';
				echo "Penyimpanan data gagal..";
			} else {
				$_SESSION['message'] = 'success';
				header('location:../show/showdatauser.php');
			}
		}
	}
?>