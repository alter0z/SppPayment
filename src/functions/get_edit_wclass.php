<?php 
  include "../connection/connection.php";

  // SET FOREIGN_KEY_CHECKS=0; -- to disable them
  // SET FOREIGN_KEY_CHECKS=1; -- to re-enable them

  if($_SERVER['REQUEST_METHOD']=='POST'){
		$name 	= $_POST['fullname'];
		$class 	= $_POST['class'];

		if ($name == '' || $class == '') {
			echo "Form belum lengkap...";
		} else {

			mysqli_query($conn, "create or replace trigger edit_wclass
			after update on wclass
			for each row
			begin
			insert into log_wclass values ('',old.fullname,old.class,new.fullname,new.class,'Merubah Data Walikelas',now(),'$_SESSION[fullname]');
			end");

      mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");
      $update = mysqli_query($conn, "UPDATE wclass set fullname='$name', class='$class' where class='$_GET[class]'");

			if (!$update) {
				$_SESSION['message'] = 'failed';
				echo mysqli_error($conn);
				echo "Penyimpanan data gagal..";
			} else {
				$_SESSION['message'] = 'success';
				header('location:../show/showdatawclass.php');
			}
		}
	}
?>