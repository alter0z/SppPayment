<?php
  include "../connection/connection.php";

  if ($_SERVER['REQUEST_METHOD']=='POST'){
    $class = $_POST['class'];
    $name = $_POST['fullname'];

    mysqli_query($conn, "create or replace trigger add_wclass
			after insert on wclass
			for each row
			begin
			insert into log_wclass values ('',null,null,new.fullname,new.class,'Memasukkan Data Walikelas',now(),'$_SESSION[fullname]');
			end");
    
    if ($class == '' || $name == ''){
      echo "Form belum lengkap!!!";		
    } else {

      $save = mysqli_query($conn, "INSERT INTO wclass VALUES ('$class','$name')");
      
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