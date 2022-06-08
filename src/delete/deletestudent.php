<?php
	session_start();
	if(isset($_SESSION['login'])){
		include "../connection/connection.php";

		mysqli_query($conn, "create or replace trigger delete_student
		after delete on student
		for each row
		begin
		delete from spp where nis='$_POST[nis]';
		insert into log_student values ('','$nis',old.student_name,old.class,old.periode,null,null,null,null,null,null,null,'Menghapus Data Siswa',now(),'$_SESSION[fullname]');
		end");

		mysqli_query($conn, "create or replace trigger delete_spp
		after delete on spp
		for each row
		begin
		update log_student set old_spp_cost = old.spp_cost, old_duedate = old.duedate where nis = '$_POST[nis]';
		end");

		mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");
		$delete = mysqli_query($conn, "DELETE FROM student WHERE nis='$_POST[nis]'");
		
		if (!$delete) {
			header('location:../show/showdatastudent.php?message=delete-stud-failed');	
		}else{
			header('location:../show/showdatastudent.php?message=delete-stud-success');
		}
	} else {
		header('location:../show/showdatastudent.php?message=delete-stud-cant-access');
	}
?>