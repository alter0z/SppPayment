<?php 
  include "../connection/connection.php";

  if($_SERVER['REQUEST_METHOD']=='POST'){
		$nis 	= $_POST['nis'];
		$name 	= $_POST['studentname'];
		$gender = $_POST['gender'];
		$class 	= $_POST['class'];
		$periode 	= $_POST['periode'];
		$cost 	= $_POST['sppcost'];
		$duedate = $_POST['duedate'];
		$status = $_POST['status'];

		mysqli_query($conn, "create or replace trigger add_student
			after insert on student
			for each row
			begin
			insert into spp values ('','$nis','$duedate','$cost','$status');
			insert into current_spp values ('$nis','$duedate','$status');
			insert into log_student values ('','$nis',null,null,null,null,null,new.student_name,new.class,new.periode,null,null,'Memasukkan Data Siswa',now(),'$_SESSION[fullname]');
			end");

			mysqli_query($conn, "create or replace trigger add_spp
			after insert on spp
			for each row
			begin
			update log_student set new_spp_cost = new.spp_cost, new_duedate = new.duedate where nis = '$nis';
			end");

		if ($nis == '' || $name == '' || $class == '' || $duedate == '' || $gender == '') {
			echo "Form belum lengkap...";
		} else {

			mysqli_query($conn, "set foreign_key_checks = 0");

			$save = mysqli_query($conn, "INSERT into student values ('$nis','$name','$gender','$class','$periode')");	

			if (!$save) {
				$_SESSION['message'] = 'failed';
				echo mysqli_error($conn);
				echo "Penyimpanan data gagal..";
			} else {
				$_SESSION['message'] = 'success';
				header('location:../show/showdatastudent.php');
			}
		}
	}
?>