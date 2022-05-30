<?php
  include "../connection/connection.php";

  if ($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    
    if ($name == '' || $username == '' || $password == '' || $role == ''){
      echo "Form belum lengkap!!!";		
    } else {
      mysqli_query($conn, "create or replace trigger add_user
			after insert on user
			for each row
			begin
			insert into log_user values ('',null,null,null,null,new.name,new.role,new.username,new.password,'Memasukkan Data User',now(),'$_SESSION[fullname]');
			end");

      $save = mysqli_query($conn, "INSERT INTO user VALUES ('$name','$role','$username','$password')");
      
      if(!$save){
        $_SESSION['message'] = 'failed';
        echo mysqli_error($conn);
        echo "Simpan data gagal!!!";
      }else{
        $_SESSION['message'] = 'success';
        header('location:../show/showdatauser.php');
      }
    }
  }
?>