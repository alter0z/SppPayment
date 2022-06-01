<?php include "../header/header.php"; ?>

<div class="content-body" style="margin-top: 125px;">
  <div class="container-fluid">
  <?php 
          if (isset($_SESSION['message']) == 'success') {
            // success alert
          } else if (isset($_SESSION['message']) == 'failed') {
            // danger alert
          }
        ?>
    <!-- <div class="alert alert-success alert-dismissible fade show">
            <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
            <strong>Success!</strong> Message has been sent.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
			  	</div>

          <div class="alert alert-danger alert-dismissible fade show">
            <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
            <strong>Error!</strong> Message sending failed.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
          </div> -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <from method="post" action="../functions/payment.php"></from>
            <div class="modal-footer">
              <input type="hidden" name="nis" id="payment-nis">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <!-- <button type="submit" class="btn btn-warning" name="pay">Bayar</button> -->
              <button type="submit">test</button>
            </div>
          </from>
        </div>
      </div>
    </div>

	  <!-- page indicator -->
    <div class="card bg-white ms-3 me-3 shadow" style="border-radius: 16px;">
		  <div class="card-body">
			  <div class="">
					<a href="../index/admin.php" class="" style="text-decoration: none; color: rgb(131, 130, 130); font-weight: bold; font-size: larger;">Dashboard</a>
					<a href="javascript:void(0)" class="" style="text-decoration: none; color: #2196f3; font-weight: bold; font-size: larger;">/ Data SPP</a>
        </div>
			</div>
		</div>
    <!-- row -->
    <div class="row">
      <div class="col-lg-12">
				<div class="card bg-white p-2 m-3 shadow" style="border-radius: 16px;">
          <div class="card-header bg-white" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
						<h4 class="card-title">Data SPP Belum Lunas</h4>
            <form class="row g-3 mt-2 mb-2" method="post" action="">
              <div class="col-2">
                <input type="text" class="form-control" name="search" maxlength="6" placeholder="Cari NIS atau Nama" autocomplete="off">
              </div>
              <div class="col-4">
                <button type="submit" class="btn btn-primary" name="getSearch">Search</button>
              </div>
            </from>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-responsive-md">
                <thead>
                  <tr>
                    <th style="width: 80px"><strong>#</strong></th>
                    <th><strong>NIS</strong></th>
                    <th><strong>Nama</strong></th>
                    <th><strong>Jenis Kelamin</strong></th>
                    <th><strong>Kelas</strong></th>
                    <th><strong>Wali Kelas</strong></th>
                    <th><strong>Tahun Ajaran</strong></th>
                    <th><strong>Biaya</strong></th>
                    <th><strong>Jatuh Tempo</strong></th>
                    <th><strong>Status</strong></th>
                    <th><strong>...</strong></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  include "../connection/connection.php";

                  if (isset($_POST['getSearch'])) {
                    $getData = mysqli_query($conn,"SELECT a.*, b.*, c.fullname, d.* FROM student as a inner join spp as b on a.nis = b.nis right join wclass as c on a.class = c.class right join current_spp as d on b.nis = d.nis where c.class in (a.class) and a.nis like '%$_POST[search]%' or a.student_name like '%$_POST[search]%' and d.current_status = 'Belum Lunas' and month(d.current_duedate) = month(now()) order by a.student_name asc");
                    $no=1;

                    while($data = mysqli_fetch_array($getData)) {
                      $date = date('D, d M Y',strtotime($data['duedate']));
                      echo "<tr>
                      <td><strong>$no</strong></td>
                      <td>$data[nis]</td>
                      <td>$data[student_name]</td>
                      <td>$data[jenis_kelamin]</td>
                      <td>$data[class]</td>
                      <td>$data[fullname]</td>
                      <td>$data[periode]</td>
                      <td>$data[spp_cost]</td>
                      <td>$date</td>
                      <td>$data[status]</td>
                      <td><a href='' class='btn btn-primary pay-button'>Bayar</a></td>
                      </tr>";
                      $no++;
                    }

                  } else {
                    $getData = mysqli_query($conn,"SELECT a.*, b.*, c.fullname, d.* FROM student as a inner join spp as b on a.nis = b.nis right join wclass as c on a.class = c.class right join current_spp as d on b.nis = d.nis where c.class in (a.class) and month(d.current_duedate) = month(now()) and d.current_status = 'Belum Lunas' order by a.student_name asc");
                    $no=1;

                    while($data = mysqli_fetch_array($getData)) {
                      $date = date('D, d M Y',strtotime($data['duedate']));
                      echo "<tr>
                      <td><strong>$no</strong></td>
                      <td class='stud-nis'>$data[nis]</td>
                      <td>$data[student_name]</td>
                      <td>$data[jenis_kelamin]</td>
                      <td>$data[class]</td>
                      <td>$data[fullname]</td>
                      <td>$data[periode]</td>
                      <td>$data[spp_cost]</td>
                      <td>$date</td>
                      <td>$data[status]</td>
                      <td><a href='' class='btn btn-primary pay-button'>Bayar</a></td>
                      </tr>";
                      $no++;
                      }
                    }
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- table all data -->
    <!-- row -->
    <div class="row">
      <div class="col-lg-12">
				<div class="card bg-white p-2 m-3 shadow" style="border-radius: 16px;">
          <div class="card-header bg-white" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
						<h4 class="card-title">Data SPP Keseluruhan</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-responsive-md">
                <thead>
                  <tr>
                    <th style="width: 80px"><strong>#</strong></th>
                    <th><strong>NIS</strong></th>
                    <th><strong>Nama</strong></th>
                    <th><strong>Jenis Kelmain</strong></th>
                    <th><strong>Kelas</strong></th>
                    <th><strong>Wali Kelas</strong></th>
                    <th><strong>Tahun Ajaran</strong></th>
                    <th><strong>Biaya</strong></th>
                    <th><strong>Jatuh Tempo</strong></th>
                    <th><strong>Status</strong></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  include "../connection/connection.php";

                  $getData = mysqli_query($conn,"SELECT a.*, b.*, c.fullname, d.* FROM student as a inner join spp as b on a.nis = b.nis right join wclass as c on a.class = c.class right join current_spp as d on b.nis = d.nis where c.class in (a.class) and month(d.current_duedate) = month(now()) order by a.student_name asc");
                  $no=1;
                  while($data = mysqli_fetch_array($getData)) {
                    $date = date('D, d M Y',strtotime($data['duedate']));
                    echo "<tr>
                    <td><strong>$no</strong></td>
                    <td>$data[nis]</td>
                    <td>$data[student_name]</td>
                    <td>$data[jenis_kelamin]</td>
                    <td>$data[class]</td>
                    <td>$data[fullname]</td>
                    <td>$data[periode]</td>
                    <td>$data[spp_cost]</td>
                    <td>$date</td>
                    <td>$data[status]</td>
                  </tr>";
                    $no++;
                  }
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- <script>
// $('.delete-button').on('click', function (e) {
// var id = $(this).attr('data-id');
//  $('.confirm-delete').attr('data-id',id);

// });
// $(".confirm-delete").on('click', function (e) {
//     var id = $(this).attr('data-id');
//     console.log(id);
//     location.href="../functions/payment.php?nis="+id;
// });
</script> -->

<?php include "../footer/footer.php"; ?>