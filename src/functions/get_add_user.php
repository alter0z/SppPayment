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
      $save = mysqli_query($conn, "INSERT INTO user VALUES ('$name','$role','$username','$password')");

      session_start();
      
      if(!$save){
        $_SESSION['message'] = 'failed';
        echo "Simpan data gagal!!!";
      }else{
        $_SESSION['message'] = 'success';
        header('location:../show/showdatauser.php');
      }
    }
  }
?>