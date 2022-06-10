<?php include "../header/header.php"; ?>

<div class="content-body" style="margin-top: 125px;">
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
						<h4 class="card-title">Data SPP Yang Belum Lunas</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="spptable" class="table table-responsive-md">
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
                    $getData = mysqli_query($conn,"SELECT a.*, b.*, c.fullname FROM student as a inner join spp as b on a.nis = b.nis right join wclass as c on a.class = c.class where c.class in (a.class) and a.nis like '%$_POST[search]%' or a.student_name like '%$_POST[search]%' and b.status = 'Belum Lunas' and month(b.duedate) = month(now()) order by a.student_name asc");
                    $no=1;

                    while($data = mysqli_fetch_array($getData)) {
                      $date = date('D, d M Y',strtotime($data['duedate']));
                      echo "<tr>
                      <td><strong>$no</strong></td>
                      <td class='getNis'>$data[nis]</td>
                      <td>$data[student_name]</td>
                      <td>$data[jenis_kelamin]</td>
                      <td>$data[class]</td>
                      <td>$data[fullname]</td>
                      <td>$data[periode]</td>
                      <td>$data[spp_cost]</td>
                      <td>$date</td>
                      <td>$data[status]</td>
                      <td><a class='btn btn-primary pay-button'>Bayar</a></td>
                      </tr>";
                      $no++;
                    }
                  } else {
                    $getData = mysqli_query($conn,"SELECT a.*, b.*, c.fullname FROM student as a inner join spp as b on a.nis = b.nis right join wclass as c on a.class = c.class where c.class in (a.class) and month(b.duedate) = month(now()) and b.status = 'Belum Lunas' order by a.student_name asc");
                    $no=1;

                    while($data = mysqli_fetch_array($getData)) {
                      $date = date('D, d M Y',strtotime($data['duedate']));
                      echo "<tr>
                      <td><strong>$no</strong></td>
                      <td class='getNis'>$data[nis]</td>
                      <td>$data[student_name]</td>
                      <td>$data[jenis_kelamin]</td>
                      <td>$data[class]</td>
                      <td>$data[fullname]</td>
                      <td>$data[periode]</td>
                      <td>$data[spp_cost]</td>
                      <td>$date</td>
                      <td>$data[status]</td>
                      <td><a class='btn btn-primary pay-button'>Bayar</a></td>
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
  </div>
</div>

<!-- get pay -->
<?php if (isset($_GET['message'])): ?>
  <input type="hidden" id="pay" value="<?php echo $_GET['message']; ?>"></input>
<?php endif; ?>

<form method="post" action="https://kusonime.com/">
  <input type="hidden" name="nis" id="nis-pay" value="475869">
  <button type="submit" style="display: none;">Pay</button>
</form>

<form method="post" action="../functions/payment.php">
  <input type="hidden" name="nis" id="nis-pay" value="475869">
  <button type="submit" id="get-pay" name="pay" style="display: none;">Pay</button>
</form>

<?php include "../footer/footer.php"; ?>

<!-- style="display: none;" ../functions/payment.php-->