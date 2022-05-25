<?php 
  include "../connection/connection.php";

  session_start();

  mysqli_query($conn, "create or replace trigger pay
  after update on spp
  for each row
  begin
  insert into transaksi values ('','$_SESSION[fullname]','$_GET[nis]',now());
  end");

  $update = mysqli_query($conn, "UPDATE spp set status='Lunas' where nis = '$_GET[nis]'");

  if (!$update) {
    echo "gagal boss";
  } else {
    header('location:../show/showdataspp.php');
  }
?>