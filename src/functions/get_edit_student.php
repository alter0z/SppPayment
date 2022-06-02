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

		mysqli_query($conn, "create or replace trigger update_student
			after update on student
			for each row
			begin
			declare getOldSppCost int;
			declare getOldDuedate date;
			declare getNewSppCost int;
			declare getNewDuedate date;
			select spp.spp_cost into getOldSppCost from spp join student on spp.nis = student.nis where spp.nis = '$nis';
			select spp.duedate into getOldDuedate from spp join student on spp.nis = student.nis where spp.nis = '$nis';
			update spp set nis = '$nis', duedate = '$duedate', spp_cost = '$cost' where nis = '$nis';
			select spp.spp_cost into getNewSppCost from spp join student on spp.nis = student.nis where spp.nis = '$nis';
			select spp.duedate into getNewDuedate from spp join student on spp.nis = student.nis where spp.nis = '$nis';
			insert into log_student values ('','$nis',old.student_name,old.class,old.periode,getOldDuedate,getOldSppCost,new.student_name,new.class,new.periode,getNewDuedate,getNewSppCost,'Merubah Data Siswa',now(),'$_SESSION[fullname]');
			end");

		if ($nis == '' || $name == '' || $class == '' || $duedate == '') {
			echo "Form belum lengkap...";
		} else {

      mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");
      $update = mysqli_query($conn, "UPDATE student set nis='$nis', student_name='$name', class='$class', periode='$periode' where nis='$_GET[nis]'");

			if (!$update) {
				$_SESSION['message'] = 'failed';
				echo mysqli_error($conn);
				echo "Penyimpanan data gagal..";
			} else {
				// mysqli_query($conn, "delete from log_student where id = (select id from log_student where status = 'Merubah Data Siswa' order by id desc limit 1)");
				$_SESSION['message'] = 'success';
				header('location:../show/showdatastudent.php');
			}
		}
	}
?>