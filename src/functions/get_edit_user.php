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
      mysqli_query($conn, "create or replace trigger update_user
			after update on user
			for each row
			begin
			insert into log_user values ('',old.name,old.username,old.role,old.password,new.name,new.username,new.role,new.password,'Merubah Data User',now(),'$_SESSION[fullname]');
			end");

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