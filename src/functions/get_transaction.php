<?php
  include "../connection/connection.php";
  $save = mysqli_query($conn, "INSERT INTO Transaction VALUES ('$nama')");
    
  if (!$save) {
    echo "Simpan data gagal!!";
    } else {
    header('location:tampil_guru.php');
  }
?>