<?php 
  require '../../lib/php-excel-reader/excel_reader2.php';
  require '../../lib/SpreadsheetReader.php';
  require '../connection/connection.php';

  session_start();

  if (isset($_POST['import-stud'])) {
    // $mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];

    // if (in_array($_FILES["file"]["type"],$mimes)) {
      $newFile = $_FILES["file"]["name"];
      $tmpFile = $_FILES["file"]["tmp_name"];
      move_uploaded_file($tmpFile,'../../data/'.$newFile);

      $reader = new SpreadsheetReader('../../data/'.$newFile);

      $totalSheet = count($reader->sheets());

      for ($i = 0; $i < $totalSheet; $i++) {
        $reader->ChangeSheet($i);

        foreach ($reader as $row) {
          $nis      = isset($row[0]) ? $row[0] : '';
          $name 	  = isset($row[1]) ? $row[1] : '';
          $gender   = isset($row[2]) ? $row[2] : '';
          $class 	  = isset($row[3]) ? $row[3] : '';
          $periode 	= isset($row[4]) ? $row[4] : '';
          $cost 	  = isset($row[5]) ? $row[5] : '';
          $duedate  = isset($row[6]) ? $row[6] : '';
          $status   = isset($row[7]) ? $row[7] : '';

          // echo $nis.'<br>';
          // echo $name.'<br>';
          // echo $gender.'<br>';
          // echo $class.'<br>';
          // echo $periode.'<br>';
          // echo $cost.'<br>';
          // echo $duedate.'<br>';
          // echo $status.'<br>';
          // echo '<br>';

          mysqli_query($conn, "create or replace trigger add_student
          after insert on student
          for each row
          begin
          insert into log_student values ('','$nis',null,null,null,null,null,new.student_name,new.class,new.periode,'$duedate','$cost','Memasukkan Data Siswa',now(),'$_SESSION[fullname]');
          end");

          mysqli_query($conn, "set foreign_key_checks = 0");
          $isUploaded = mysqli_query($conn, "INSERT into student values ('$nis','$name','$gender','$class','$periode')");

          mysqli_query($conn, "start transaction");
          mysqli_query($conn, "insert into spp values ('','$nis','$duedate','$cost','$status')");
          echo mysqli_error($conn);

          if (!$isUploaded) {
            mysqli_query($conn, "rollback");
            header('location:../show/showdatastudent.php?message=add-stud-failed');
          } else {
            mysqli_query($conn, "commit");
            header('location:../show/showdatastudent.php?message=add-stud-success');
          }
        }
      }

    // } else {
    //   echo "file not allowed";
    // }
  }
?>