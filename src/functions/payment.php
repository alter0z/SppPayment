<?php 
  include "../connection/connection.php";

  session_start();

    mysqli_query($conn, "create or replace trigger pay
    after update on spp
    for each row
    begin
    declare getStatus varchar(64);
    select status into getStatus from spp where nis = '$_GET[nis]';
    if getStatus = 'Lunas' then
    insert into transaksi values ('','$_SESSION[fullname]','$_GET[nis]',now(),'Lunas');
    end if;
    end");

    $update = mysqli_query($conn, "UPDATE spp set status='Lunas' where nis = '$_GET[nis]'");

    if (!$update) {
      $_SESSION['message'] = 'pay failed';
      header('location:../show/showdataspp.php');
      // echo "fail";
    } else {
      mysqli_query($conn, "UPDATE spp set duedate = date_add(duedate,interval 1 month), status = 'Belum Lunas' where nis = '$_GET[nis]'");
      $_SESSION['message'] = 'pay success';
      header('location:../show/showdataspp.php');
      // echo "suc";
    }
?>