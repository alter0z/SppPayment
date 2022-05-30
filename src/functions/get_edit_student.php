<?php 
  include "../connection/connection.php";

  // SET FOREIGN_KEY_CHECKS=0; -- to disable them
  // SET FOREIGN_KEY_CHECKS=1; -- to re-enable them

  if($_SERVER['REQUEST_METHOD']=='POST'){
		$nis 	= $_POST['nis'];
		$name 	= $_POST['studentname'];
		$class 	= $_POST['class'];
		$periode 	= $_POST['periode'];
		$cost 	= $_POST['sppcost'];
		$duedate = $_POST['duedate'];

		if ($nis == '' || $name == '' || $class == '' || $duedate == ''){
			echo "Form belum lengkap...";
		} else {
			mysqli_query($conn, "create or replace trigger update_student
			after update on student
			for each row
			begin
			update spp set nis = '$nis', '$duedate', spp_cost = '$cost' where nis = '$nis';
			update current_spp set duedate = '$duedate' where nis = '$nis';
			insert into log_student values ('','$nis',old.student_name,old.class,old.periode,null,null,new.student_name,new.class,new.periode,null,null,'Merubah Data Siswa',now(),'$_SESSION[fullname]');
			end");

			mysqli_query($conn, "create or replace trigger update_spp
			after update on spp
			for each row
			begin
			update log_student set old_spp_cost = old.spp_cost, new_spp_cost = new.spp_cost, old_duedate = old.duedate, new_duedate = new.duedate where nis = '$nis';
			end");

      mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");
      $update = mysqli_query($conn, "UPDATE student set nis='$nis', student_name='$name', class='$class', periode='$periode' where nis='$_GET[nis]'");

			if (!$update) {
				$_SESSION['message'] = 'failed';
				echo "Penyimpanan data gagal..";
			} else {
				$_SESSION['message'] = 'success';
				header('location:../show/showdatastudent.php');
			}
		}
	}
?>