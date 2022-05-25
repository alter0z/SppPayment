<?php
  include "../connection/connection.php";

  if ($_SERVER['REQUEST_METHOD']=='POST'){
    $class = $_POST['class'];
    $name = $_POST['fullname'];
    
    if ($class == '' || $name == ''){
      echo "Form belum lengkap!!!";		
    } else {
      $save = mysqli_query($conn, "INSERT INTO wclass VALUES ('$class','$name')");

      session_start();
      
      if(!$save){
        $_SESSION['message'] = 'failed';
        echo "Simpan data gagal!!!";
      }else{
        $_SESSION['message'] = 'success';
        header('location:../show/showdatawclass.php');
      }
    }
  }
?>