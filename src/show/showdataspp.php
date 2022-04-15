<?php include "../header/header.php"; ?>

<div class="content-body">
        <div class="container-fluid">
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
									<h4 class="card-title">Data SPP</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-responsive-md">
                      <thead>
                        <tr>
                          <th style="width: 80px"><strong>#</strong></th>
                          <th><strong>NIS</strong></th>
                          <th><strong>Nama</strong></th>
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

												$getData = mysqli_query($conn,"SELECT a.*, b.*, c.fullname FROM student as a inner join spp as b on a.nis = b.nis right join wclass as c on a.class = c.class where c.class in (a.class) order by a.student_name asc");
												$no=1;
												while($data = mysqli_fetch_array($getData)) {
													$date = date('D, d M Y',strtotime($data['duedate']));
													echo "<tr>
                          <td><strong>$no</strong></td>
                          <td>$data[nis]</td>
                          <td>$data[student_name]</td>
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

<?php include "../footer/footer.php"; ?>