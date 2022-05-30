<?php include "../header/header.php"; ?>

<!-- get data from database -->
<?php 
  include "../connection/connection.php";

  $getDataUadmin = mysqli_query($conn, "SELECT count(name) as count from user where role = 'admin'");
  $dataUadmin = mysqli_fetch_assoc($getDataUadmin);

  $getDataUwclass = mysqli_query($conn, "SELECT count(name) as count from user where role = 'walikelas'");
  $dataUwclass = mysqli_fetch_assoc($getDataUwclass);

  $getDataUser = mysqli_query($conn, "SELECT count(name) as count from user");
  $dataUser = mysqli_fetch_assoc($getDataUser);

  $getDataWclass = mysqli_query($conn, "SELECT count(class) as count from wclass");
  $dataWclass = mysqli_fetch_assoc($getDataWclass);

  $getDataStudent = mysqli_query($conn, "SELECT count(nis) as count from student");
  $dataStudent = mysqli_fetch_assoc($getDataStudent);

  $getDataSpp = mysqli_query($conn, "SELECT count(nis) as count from spp");
  $dataSpp = mysqli_fetch_assoc($getDataSpp);
  
  $getPaid = mysqli_query($conn, "SELECT count(nis) as count from current_spp where current_status='Lunas'");
  $dataPaid = mysqli_fetch_assoc($getPaid);
  
  $getUnpaid = mysqli_query($conn, "SELECT count(nis) as count from current_spp where current_status='Belum Lunas'");
  $dataUnpaid = mysqli_fetch_assoc($getUnpaid);
?>

<div class="container-fluid ps-4 pe-4">
    <!-- Count Users -->
    <div class="row">
        <div class="col-xl-4 col-xxl-4 col-sm-8">
            <!-- card data user (Admin) -->
            <div class="card bg-primary bg-gradient p-3 ms-2 me-2 mt-2 mb-4 opacity-75" style="border-radius: 26px">
                <div class="card-body">
                    <h2 class="text-white"><?php echo $dataUadmin['count'];?></h2>
                    <span class="text-white fs-18">Total Data User (Admin)</span>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-xxl-4 col-sm-8">
            <!-- card data user (Walkas) -->
            <div class="card bg-success bg-gradient p-3 ms-2 me-2 mt-2 mb-4 opacity-75" style="border-radius: 26px">
                <div class="card-body">
                    <h2 class="text-white"><?php echo $dataUwclass['count'];?></h2>
                    <span class="text-white fs-18">Total Data User (Wali Kelas)</span>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-xxl-4 col-sm-8">
            <!-- card data user-->
            <div class="card bg-info bg-gradient p-3 ms-2 me-2 mt-2 mb-4 opacity-75" style="border-radius: 26px">
                <div class="card-body">
                    <h2 class="text-white"><?php echo $dataUser['count'];?></h2>
                    <span class="text-white fs-18">Total Data User</span>
                </div>
            </div>
        </div>
    </div>
    <!-- count data pembayaran -->
    <div class="row">
        <div class="col-xl-3 col-xxl-3 col-sm-6">
            <!-- card data siswa -->
            <div class="card bg-warning bg-gradient p-3 ms-2 me-2 mt-2 mb-4 opacity-75" style="border-radius: 26px">
                <div class="card-body">
                    <h2 class="text-white"><?php echo $dataStudent['count'];?></h2>
                    <span class="text-white fs-18">Total Siswa</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-3 col-sm-6">
            <!-- card data paid Invoices -->
            <div class="card bg-primary bg-gradient p-3 ms-2 me-2 mt-2 mb-4 opacity-75" style="border-radius: 26px">
                <div class="card-body">
                    <h2 class="text-white"><?php echo $dataPaid['count'];?></h2>
                    <span class="text-white fs-18">Total Siswa Sudah Lunas</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-3 col-sm-6">
            <!-- card data Unpaid Invoices -->
            <div class="card bg-success bg-gradient p-3 ms-2 me-2 mt-2 mb-4 opacity-75" style="border-radius: 26px">
                <div class="card-body">
                    <h2 class="text-white"><?php echo $dataUnpaid['count'];?></h2>
                    <span class="text-white fs-18">Total Siswa Belum Lunas</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-3 col-sm-6">
            <!-- card data SPP -->
            <div class="card bg-info bg-gradient p-3 ms-2 me-2 mt-2 mb-4 opacity-75" style="border-radius: 26px">
                <div class="card-body">
                    <h2 class="text-white"><?php echo $dataSpp['count'];?></h2>
                    <span class="text-white fs-18">Total Tagihan SPP</span>
                </div>
            </div>
        </div>
    </div>
    <!-- count walkas & transaction -->
    <div class="row">
        <div class="col-xl-6 col-xxl-6 col-sm-12">
            <!-- card data Walikelas = jumlah kelas-->
            <div class="card bg-info bg-gradient p-3 ms-2 me-2 mt-2 mb-4 opacity-75" style="border-radius: 26px">
                <div class="card-body">
                    <h2 class="text-white"><?php echo $dataWclass['count'];?></h2>
                    <span class="text-white fs-18">Total Wali Kelas</span>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-6 col-sm-12">
            <!-- card data transaksi -->
            <div class="card bg-warning bg-gradient p-3 ms-2 me-2 mt-2 mb-4 opacity-75" style="border-radius: 26px">
                <div class="card-body">
                    <h2 class="text-white"><?php echo '0';?></h2>
                    <span class="text-white fs-18">Total Transaksi</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../footer/footer.php"; ?>

