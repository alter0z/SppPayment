<?php
  include "../connection/connection.php";

  if ($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    mysqli_query($conn, "create or replace trigger add_user
			after insert on user
			for each row
			begin
			insert into log_user values ('',null,null,null,null,new.name,new.username,new.role,new.password,'Memasukkan Data User',now(),'$_SESSION[fullname]');
			end");
    
    if ($name == '' || $username == '' || $password == '' || $role == ''){
      echo "Form belum lengkap!!!";		
    } else {

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