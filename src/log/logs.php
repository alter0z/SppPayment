<?php include "./header/header.php"; ?>

<?php 
  include "../connection/connection.php";

  $getLogInsertStudent = mysqli_query($conn, "SELECT nis, new_name, new_class, new_period, new_duedate, new_spp_cost, status, tanggal, admin from log_student");
  $no = 1;
  while ($dataLogInsertStudent = mysqli_fetch_array($getLogInsertStudent)) {
    // loop table
    $no++;
  }
?>

<?php include "footer.php"; ?>