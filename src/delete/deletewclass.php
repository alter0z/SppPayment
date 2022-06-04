<?php
	session_start();
	if(isset($_SESSION['login'])){
		if (isset($_POST['delete-wclass'])) {
			include "../connection/connection.php";

			mysqli_query($conn, "create or replace trigger add_wclass
			after delete on wclass
			for each row
			begin
			insert into log_wclass values ('',old.fullname,old.class,null,null,'Menghapus Data Walikelas',now(),'$_SESSION[fullname]');
			end");

			$delete = mysqli_query($conn, "DELETE FROM wclass WHERE class='$_POST[class]'");
			
			if (!$delete) {
				echo mysqli_error($conn);
				header('location:../show/showdatawclass.php?message=delete-wclass-failed');
			}else{
				header('location:../show/showdatawclass.php?message=delete-wclass-success');
			}
		}
	} else {
		header('location:../show/showdatawclass.php?message=delete-wclass-cant-access');
	}
?>