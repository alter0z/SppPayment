<?php 
  include "../connection/connection.php";

  session_start();

  mysqli_query($conn, "create or replace trigger pay
  after update on current_spp
  for each row
  begin
  insert into transaksi values ('','$_SESSION[fullname]','$_GET[nis]',now());
  update spp set duedate = date_add(duedate,interval 1 month), status = 'Belum Lunas' where nis = '$_GET[nis]';
  end");

  $update = mysqli_query($conn, "UPDATE current_spp set current_status='Lunas' where nis = '$_GET[nis]'");

  if (!$update) {
    echo mysqli_error($conn);
    echo "gagal boss";
  } else {
    header('location:../show/showdataspp.php');
  }
?>