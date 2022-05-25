<?php 
  include "../connection/connection.php";

  if($_SERVER['REQUEST_METHOD']=='POST'){
		$nis 	= $_POST['nis'];
		$name 	= $_POST['studentname'];
		$class 	= $_POST['class'];
		$periode 	= $_POST['periode'];
		$cost 	= $_POST['sppcost'];
		$duedate = $_POST['duedate'];
		$status = $_POST['status'];

		if ($nis == '' || $name == '' || $class == '' || $duedate == ''){
			echo "Form belum lengkap...";
		} else {
			mysqli_query($conn, "create or replace trigger add_student
			after insert on student
			for each row
			begin
			insert into spp values ('$nis','$duedate','$cost','$status');
			insert into log_student values ('','$nis',null,null,null,null,null,new.student_name,new.class,new.periode,null,null,'Memasukkan Data Siswa',now(),'$_SESSION[fullname]');
			end");

			mysqli_query($conn, "create or replace trigger add_spp
			after insert on spp
			for each row
			begin
			update log_student set new_duedate = new.duedate, new_spp_cost = new.spp_cost;
			end");

			mysqli_query($conn, "create or replace trigger update_student
			after update on student
			for each row
			begin
			insert into log_student values ('','$nis',old.student_name,old.class,old.periode,null,null,new.student_name,new.class,new.periode,null,null,'Merubah Data Siswa',now(),'$_SESSION[fullname]');
			end");

			mysqli_query($conn, "create or replace trigger update_spp
			after insert on spp
			for each row
			begin
			update log_student set old_duedate = old.duedate, old_spp_cost = old.spp_cost, new_duedate = new.duedate, new_spp_cost = new.spp_cost;
			end");

			mysqli_query($conn, "create or replace trigger delete_student
			after delete on student
			for each row
			begin
			insert into log_student values ('','$nis',old.student_name,old.class,old.periode,null,null,null,null,null,null,null,'Menghapus Data Siswa',now(),'$_SESSION[fullname]');
			end");

			mysqli_query($conn, "create or replace trigger delete_spp
			after delete on spp
			for each row
			begin
			update log_student set old_duedate = old.duedate, old_spp_cost = old.spp_cost;
			end");

			$save = mysqli_query($conn, "INSERT INTO student VALUES('$nis','$name','$class','$periode')");

			session_start();

			if (!$save) {
				$_SESSION['message'] = 'failed';
				echo "Penyimpanan data gagal..";
			} else {
				$_SESSION['message'] = 'success';
				header('location:../show/showdatastudent.php');
			}
		}
	}
?>