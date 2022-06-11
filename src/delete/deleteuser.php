<?php
	session_start();
	if(isset($_SESSION['login'])){
		if (isset($_POST['delete-user'])) {
			include "../connection/connection.php";
			mysqli_query($conn, "create or replace trigger del_user
			after delete on user
			for each row
			begin
			insert into log_user values ('',old.name,old.username,old.role,old.password,null,null,null,null,'Menghapus Data User',now(),'$_SESSION[fullname]');
			end");

			$delete = mysqli_query($conn, "DELETE FROM user WHERE username='$_POST[uname]'");
			
			if (!$delete) {
				header('location:../show/showdatauser.php?message=delete-user-failed');
			}else{
				header('location:../show/showdatauser.php?message=delete-user-success');
			}
		}
	} else {
		header('location:../show/showdatauser.php?message=delete-user-cant-access');
	}
?>