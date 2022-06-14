<?php
  include "../connection/connection.php";

  $count = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) from wclass"));

  if ($count['count(*)'] >= 18) {
    header('location:../show/showdatawclass.php?message=add-wclass-dont');
  }

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
      header('location:../add/addwclass.php?message=add-wclass-empty');		
    } else {

      $save = mysqli_query($conn, "INSERT INTO wclass VALUES ('$class','$name')");
      
      if(!$save){
        header('location:../show/showdatawclass.php?message=add-wclass-failed');
      }else{
        header('location:../show/showdatawclass.php?message=add-wclass-success');;
      }
    }
  }
?>