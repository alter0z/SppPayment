<?php 
  include "../connection/connection.php";

  session_start();
  header('location:../show/showdataspp.php');

  if (isset($_POST['pay'])) {
    mysqli_query($conn, "create or replace trigger pay
    after update on spp
    for each row
    begin
    declare getStatus varchar(64);
    select status into getStatus from spp where nis = '$_POST[nis]';
    if getStatus = 'Belum Lunas' then
    insert into transaksi values ('','$_SESSION[fullname]','$_POST[nis]',now());
    end if;
    end");

    $update = mysqli_query($conn, "UPDATE spp set status='Lunas' where nis = '$_POST[nis]'");

    if (!$update) {
      echo mysqli_error($conn);
      echo "gagal boss";
    } else {
      mysqli_query($conn, "UPDATE spp set duedate = date_add(duedate,interval 1 month), status = 'Belum Lunas' where nis = '$_POST[nis]");
      header('location:../show/showdataspp.php');
    }
  } else {
    echo "has no post";
  }
?>