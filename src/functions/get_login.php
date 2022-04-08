<?php
  include "../connection/connection.php";

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if($username == '' || $password == ''){
			echo "Form belum lengkap!!";
		}else{
			$login = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
			$check = mysqli_num_rows($login);
			$data = mysqli_fetch_array($login);
			if($check > 0){
				session_start();
				$_SESSION['login']	= true;
				$_SESSION['id']		= $data['idadmin'];
				$_SESSION['username']=$data['username'];
				
				header('location:../index.php');
			}else{
				echo "Username dan Password anda Salah!!!";
			}
		}
	}
?>