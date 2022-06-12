<?php include "../header/headerw.php"; ?>

<div class="content-body" style="margin-top: 125px;">
        <div class="container-fluid">
				<!-- page indicator -->
				<div class="card bg-white ms-3 me-3 shadow" style="border-radius: 16px;">
					<div class="card-body">
						<div class="">
						<a href="javascript:void(0)" class="" style="text-decoration: none; color: #2196f3; font-weight: bold; font-size: larger;">Dashboard</a>
									</div>
					</div>
				</div>
				<!-- row tagihan siswa -->
				<div class="row">
					<div class="col-lg-12">
						<div class="card bg-white p-2 m-3 shadow" style="border-radius: 16px;">
							<div class="card-header bg-white" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
								<h4 class="card-title">Data Tagihan Siswa</h4>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="datatagsiswa" class="table table-responsive-md">
										<thead>
											<tr>
												<th style="width: 80px"><strong>#</strong></th>
												<th><strong>NIS</strong></th>
												<th><strong>Nama</strong></th>
												<th><strong>Jenis Kelamin</strong></th>
												<th><strong>Kelas</strong></th>
												<th><strong>Wali Kelas</strong></th>
												<th><strong>Tahun Ajaran</strong></th>
												<th><strong>Jatuh Tempo</strong></th>
												<th><strong>Biaya</strong></th>
												<th><strong>Status</strong></th>
											</tr>
										</thead>
										<tbody>
										<?php 
												include "../connection/connection.php";

												$getWclas = $_SESSION['wclass'];

												$getData = mysqli_query($conn,"SELECT a.*, b.fullname, c.* FROM student as a inner join wclass as b on a.class = b.class right join spp as c on a.nis = c.nis where b.fullname = '$getWclas' and month(c.duedate) = month(now()) order by a.student_name asc");

												$no=1;
												while($data = mysqli_fetch_array($getData)){
													echo "<tr>
														<td>$no</td>
														<td>$data[nis]</td>
														<td>$data[student_name]</td>
														<td>$data[jenis_kelamin]</td>
														<td>$data[class]</td>
														<td>$data[fullname]</td>
														<td>$data[periode]</td>
														<td>$data[duedate]</td>
														<td>$data[spp_cost]</td>
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
				<!-- row transaksi siswa -->
				<div class="row">
					<div class="col-lg-12">
						<div class="card bg-white p-2 m-3 shadow" style="border-radius: 16px;">
							<div class="card-header bg-white" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
								<h4 class="card-title">Data Transaksi Siswa</h4>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="datatranssiswa" class="table table-responsive-md">
										<thead>
											<tr>
												<th style="width: 80px"><strong>#</strong></th>
												<th><strong>NIS</strong></th>
												<th><strong>Nama</strong></th>
												<th><strong>Jenis Kelamin</strong></th>
												<th><strong>Kelas</strong></th>
												<th><strong>Wali Kelas</strong></th>
												<th><strong>Status</strong></th>
												<th><strong>Tanggal</strong></th>
												<th><strong>Admin</strong></th>
											</tr>
										</thead>
										<tbody>
										<?php 
											include "../connection/connection.php";

											$getWclas = $_SESSION['wclass'];

											$getData = mysqli_query($conn,"SELECT a.*, b.*, c.* FROM transaksi as a join student as b on a.nis = b.nis join wclass as c on b.class = c.class where c.fullname = '$getWclas' order by b.student_name asc");

											$no=1;
											while($d=mysqli_fetch_array($getData)){
												$date = date('D, d M Y h:i a',strtotime($d['tanggal']));
												echo "<tr>
												<td>$no</td>
												<td>$d[nis]</td>
												<td>$d[student_name]</td>
												<td>$d[jenis_kelamin]</td>
												<td>$d[class]</td>
												<td>$d[fullname]</td>
												<td>$d[spp_status]</td>
												<td>$date</td>
												<td>$d[admin]</td>
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

		<!-- alert login -->
		<?php if (isset($_GET['message'])): ?>
			<input type="hidden" id="login" value="<?php echo $_GET['message']; ?>"></input>
		<?php endif; ?>

<?php include "../footer/footer.php"; ?>