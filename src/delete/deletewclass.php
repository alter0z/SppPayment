<?php
	session_start();
	if(isset($_SESSION['login'])){
		include "../connection/connection.php";

		mysqli_query($conn, "create or replace trigger add_wclass
		after delete on wclass
		for each row
		begin
		insert into log_wclass values ('',old.fullname,old.class,null,null,'Menghapus Data Walikelas',now(),'$_SESSION[fullname]');
		end");

		$delete = mysqli_query($conn, "DELETE FROM wclass WHERE class='$_GET[class]'");
		
		if (!$delete) {
			$_SESSION['message'] = 'failed';
			echo "Hapus data gagal, atau data sedang digunakan di tabel lain...<br/>
			<a href='../show/showdatawclass.php'>Kembali</a>";	
		}else{
			$_SESSION['message'] = 'success';
			header('location:../show/showdatawclass.php');
		}
	} else {
		echo "Anda tidak memiliki akses ke halaman ini!!! <br> <a href='../index/admin.php'>Kembali</a>";
	}
?>