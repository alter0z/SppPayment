<?php
	session_start();
	if(isset($_SESSION['login'])){
		include "../connection/connection.php";

		mysqli_query($conn, "create or replace trigger del_user
		after delete on user
		for each row
		begin
		insert into log_user values ('',old.name,old.role,old.username,old.password,null,null,null,null,'Menghapus Data User',now(),'$_SESSION[fullname]');
		end");

		$delete = mysqli_query($conn, "DELETE FROM user WHERE username='$_GET[username]'");
		
		if (!$delete) {
			$_SESSION['message'] = 'failed';
			echo "Hapus data gagal, atau data sedang digunakan di tabel lain...<br/>
			<a href='../show/showdatauser.php'>Kembali</a>";	
		}else{
			$_SESSION['message'] = 'success';
			header('location:../show/showdatauser.php');
		}
	} else {
		echo "Anda tidak memiliki akses ke halaman ini!!! <br> <a href='../index/admin.php'>Kembali</a>";
	}
?>