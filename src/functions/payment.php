<?php 
  include "../connection/connection.php";

  session_start();

  if (isset($_POST['pay'])) {
    mysqli_query($conn, "create or replace trigger pay
    after update on spp
    for each row
    begin
    declare getStatus varchar(64);
    select status into getStatus from spp where nis = '$_POST[nis]';
    if getStatus = 'Lunas' then
    insert into transaksi values ('','$_SESSION[fullname]','$_POST[nis]',now(),'Lunas');
    end if;
    end");

    $pay = mysqli_query($conn, "UPDATE spp set status='Lunas' where nis = '$_POST[nis]'");

    if (!$pay) {
      header('location:../show/showdataspp.php?message=pay-failed');
    } else {
      mysqli_query($conn, "UPDATE spp set duedate = date_add(duedate,interval 1 month), status = 'Belum Lunas' where nis = '$_POST[nis]'");
      header('location:../show/showdataspp.php?message=pay-success');
    }
  }
?>