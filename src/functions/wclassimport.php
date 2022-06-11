<?php 
  require '../../lib/php-excel-reader/excel_reader2.php';
  require '../../lib/SpreadsheetReader.php';
  require '../connection/connection.php';

  session_start();

  if (isset($_POST['import-wclass'])) {
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
          $class = isset($row[0]) ? $row[0] : '';
          $name 	  = isset($row[1]) ? $row[1] : '';

          // echo $class.'<br>';
          // echo $name.'<br>';

          mysqli_query($conn, "create or replace trigger add_wclass
          after insert on wclass
          for each row
          begin
          insert into log_wclass values ('',null,null,new.fullname,new.class,'Memasukkan Data Walikelas',now(),'$_SESSION[fullname]');
          end");

          $isUploaded = mysqli_query($conn, "INSERT INTO wclass VALUES ('$class','$name')");

          echo mysqli_error($conn);

          if (!$isUploaded) {
            header('location:../show/showdatawclass.php?message=add-wclass-failed');
          } else {
            header('location:../show/showdatawclass.php?message=add-wclass-success');
          }
        }
      }

    // } else {
    //   echo "file not allowed";
    // }
  }
?>