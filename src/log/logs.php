<?php include "../header/header.php"; ?>

<div class="content-body" style="margin-top: 125px;">
	<div class="container-fluid">
		<div class="card bg-white ms-3 me-3 shadow" style="border-radius: 16px;">
			<div class="card-body">
				<div class="">
					<a href="../index/admin.php" class="" style="text-decoration: none; color: rgb(131, 130, 130); font-weight: bold; font-size: larger;">Dashboard</a>
					<a href="javascript:void(0)" class="" style="text-decoration: none; color: #2196f3; font-weight: bold; font-size: larger;">/ Logs</a>
						</div>
			</div>
		</div>
		<!-- logs user -->
		<div class="row">
			<div class="col-xl-6 col-xxl-6 col-sm-12">
			<!-- add user -->
				<div class="card bg-white p-2 mt-3 ms-3 me-1 mb-3 shadow" style="border-radius: 16px;">
					<div class="card-header bg-white" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
					<h4 class="card-title">Log Tambah User</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
              <table class="table table-responsive-md">
                <thead>
                  <tr>
                    <th style="width: 80px"><strong>#</strong></th>
                    <th><strong>Nama</strong></th>
                    <th><strong>Username</strong></th>
                    <th><strong>Role</strong></th>
                    <th><strong>Password</strong></th>
                    <th><strong>Status</strong></th>
                    <th><strong>Tanggal</strong></th>
                    <th><strong>Admin</strong></th>
                  </tr>
                </thead>
                <tbody>
									<?php
									include "../connection/connection.php";
									$sql = mysqli_query($conn, "SELECT*from log_user where status = 'Memasukkan Data User' order by tanggal asc");
									echo mysqli_error($conn);
									$no=1;
									while($d=mysqli_fetch_array($sql)){
										// $date = date('D, d M Y',strtotime($d['date']));
										echo "<tr>
											<td>$no</td>
											<td>$d[new_name]</td>
											<td>$d[new_username]</td>
											<td>$d[new_role]</td>
											<td>$d[new_password]</td>
											<td>$d[status]</td>
											<td>$d[tanggal]</td>
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
			<div class="col-xl-6 col-xxl-6 col-sm-12">
				<!-- delete user -->
					<div class="card bg-white p-2 mt-3 ms-1 me-3 mb-3 shadow" style="border-radius: 16px;">
						<div class="card-header bg-white" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
						<h4 class="card-title">Log Hapus User</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-responsive-md">
									<thead>
										<tr>
											<th style="width: 80px"><strong>#</strong></th>
											<th><strong>Nama</strong></th>
											<th><strong>Username</strong></th>
											<th><strong>Role</strong></th>
											<th><strong>Password</strong></th>
											<th><strong>Status</strong></th>
											<th><strong>Tanggal</strong></th>
											<th><strong>Admin</strong></th>
										</tr>
									</thead>
									<tbody>
										<?php
										include "../connection/connection.php";
										$sql = mysqli_query($conn, "SELECT*from log_user where status = 'Menghapus Data User' order by tanggal asc");
										echo mysqli_error($conn);
										$no=1;
										while($d=mysqli_fetch_array($sql)){
											// $date = date('D, d M Y',strtotime($d['date']));
											echo "<tr>
												<td>$no</td>
												<td>$d[old_name]</td>
												<td>$d[old_username]</td>
												<td>$d[old_role]</td>
												<td>$d[old_password]</td>
												<td>$d[status]</td>
												<td>$d[tanggal]</td>
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
		<!-- edit user -->
		<div class="row">
			<div class="col">
				<div class="card bg-white p-2 m-3 shadow" style="border-radius: 16px;">
					<div class="card-header bg-white" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
					<h4 class="card-title">Log Edit User</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-responsive-md">
								<thead>
									<tr>
										<th style="width: 80px"><strong>#</strong></th>
										<th><strong>Nama Lama</strong></th>
										<th><strong>Nama Baru</strong></th>
										<th><strong>Username Lama</strong></th>
										<th><strong>Username Baru</strong></th>
										<th><strong>Role Lama</strong></th>
										<th><strong>Role Baru</strong></th>
										<th><strong>Password Lama</strong></th>
										<th><strong>Password Baru</strong></th>
										<th><strong>Status</strong></th>
										<th><strong>Tanggal</strong></th>
										<th><strong>Admin</strong></th>
									</tr>
								</thead>
								<tbody>
									<?php
									include "../connection/connection.php";
									$sql = mysqli_query($conn, "SELECT*from log_user where status = 'Merubah Data User' order by tanggal asc");
									echo mysqli_error($conn);
									$no=1;
									while($d=mysqli_fetch_array($sql)){
										// $date = date('D, d M Y',strtotime($d['date']));
										echo "<tr>
											<td>$no</td>
											<td>$d[old_name]</td>
											<td>$d[new_name]</td>
											<td>$d[old_username]</td>
											<td>$d[new_username]</td>
											<td>$d[old_role]</td>
											<td>$d[new_role]</td>
											<td>$d[old_password]</td>
											<td>$d[new_password]</td>
											<td>$d[status]</td>
											<td>$d[tanggal]</td>
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
		<!-- Log Student -->
		<div class="row">
			<div class="col-xl-6 col-xxl-6 col-sm-12">
			<!-- add Student -->
				<div class="card bg-white p-2 mt-3 ms-3 me-1 mb-3 shadow" style="border-radius: 16px;">
					<div class="card-header bg-white" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
					<h4 class="card-title">Log Tambah Siswa</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
              <table class="table table-responsive-md">
                <thead>
                  <tr>
                    <th style="width: 80px"><strong>#</strong></th>
                    <th><strong>Nama</strong></th>
                    <th><strong>Kelas</strong></th>
                    <th><strong>Tahun Ajaran</strong></th>
                    <th><strong>Jatuh Tempo</strong></th>
                    <th><strong>Tagihan</strong></th>
                    <th><strong>Status</strong></th>
                    <th><strong>Tanggal</strong></th>
                    <th><strong>Admin</strong></th>
                  </tr>
                </thead>
                <tbody>
								<?php
								include "../connection/connection.php";
								$sql = mysqli_query($conn, "SELECT*from log_student where status = 'Memasukkan Data Siswa' order by tanggal asc");
								echo mysqli_error($conn);
								$no=1;
								while($d=mysqli_fetch_array($sql)){
									// $date = date('D, d M Y',strtotime($d['date']));
									echo "<tr>
										<td>$no</td>
										<td>$d[new_name]</td>
										<td>$d[new_class]</td>
										<td>$d[new_period]</td>
										<td>$d[new_spp_cost]</td>
										<td>$d[status]</td>
										<td>$d[tanggal]</td>
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
			<div class="col-xl-6 col-xxl-6 col-sm-12">
				<!-- delete student -->
					<div class="card bg-white p-2 mt-3 ms-1 me-3 mb-3 shadow" style="border-radius: 16px;">
						<div class="card-header bg-white" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
						<h4 class="card-title">Log Hapus Siswa</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-responsive-md">
									<thead>
										<tr>
											<th style="width: 80px"><strong>#</strong></th>
											<th><strong>Nama</strong></th>
											<th><strong>Kelas</strong></th>
											<th><strong>Tahun Ajaran</strong></th>
											<th><strong>Jatuh Tempo</strong></th>
											<th><strong>Tagihan</strong></th>
											<th><strong>Status</strong></th>
											<th><strong>Tanggal</strong></th>
											<th><strong>Admin</strong></th>
										</tr>
									</thead>
									<tbody>
										<?php
										include "../connection/connection.php";
										$sql = mysqli_query($conn, "SELECT*from log_student where status = 'Menghapus Data Siswa' order by tanggal asc");
										echo mysqli_error($conn);
										$no=1;
										while($d=mysqli_fetch_array($sql)){
											// $date = date('D, d M Y',strtotime($d['date']));
											echo "<tr>
												<td>$no</td>
												<td>$d[old_name]</td>
												<td>$d[old_class]</td>
												<td>$d[old_period]</td>
												<td>$d[old_spp_cost]</td>
												<td>$d[status]</td>
												<td>$d[tanggal]</td>
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
		<!-- edit student -->
		<div class="row">
			<div class="col">
				<div class="card bg-white p-2 m-3 shadow" style="border-radius: 16px;">
					<div class="card-header bg-white" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
					<h4 class="card-title">Log Edit Siswa</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-responsive-md">
								<thead>
									<tr>
										<th style="width: 80px"><strong>#</strong></th>
										<th><strong>Nama Lama</strong></th>
										<th><strong>Nama Baru</strong></th>
										<th><strong>Kelas Lama</strong></th>
										<th><strong>Kelas Baru</strong></th>
										<th><strong>Tahun Ajaran Lama</strong></th>
										<th><strong>Tahun Ajaran Baru</strong></th>
										<th><strong>Jatuh Tempo Lama</strong></th>
										<th><strong>Jatuh Tempo Baru</strong></th>
										<th><strong>Tagihan Lama</strong></th>
										<th><strong>Tagihan Baru</strong></th>
										<th><strong>Status</strong></th>
										<th><strong>Tanggal</strong></th>
										<th><strong>Admin</strong></th>
									</tr>
								</thead>
								<tbody>
									<?php
									include "../connection/connection.php";
									$sql = mysqli_query($conn, "SELECT*from log_student where status = 'Merubah Data Siswa' order by tanggal asc");
									echo mysqli_error($conn);
									$no=1;
									while($d=mysqli_fetch_array($sql)){
										// $date = date('D, d M Y',strtotime($d['date']));
										echo "<tr>
										<td>$no</td>
											<td>$d[old_name]</td>
											<td>$d[new_name]</td>
											<td>$d[old_class]</td>
											<td>$d[new_class]</td>
											<td>$d[old_period]</td>
											<td>$d[new_period]</td>
											<td>$d[old_spp_cost]</td>
											<td>$d[new_spp_cost]</td>
											<td>$d[status]</td>
											<td>$d[tanggal]</td>
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
		<!-- Log Wclass -->
		<div class="row">
			<div class="col-xl-6 col-xxl-6 col-sm-12">
			<!-- add wclass -->
				<div class="card bg-white p-2 mt-3 ms-3 me-1 mb-3 shadow" style="border-radius: 16px;">
					<div class="card-header bg-white" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
					<h4 class="card-title">Log Tambah Wali Kelas</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
              <table class="table table-responsive-md">
                <thead>
                  <tr>
                    <th style="width: 80px"><strong>#</strong></th>
                    <th><strong>Nama</strong></th>
                    <th><strong>Kelas</strong></th>
                    <th><strong>Status</strong></th>
                    <th><strong>Tanggal</strong></th>
                    <th><strong>Admin</strong></th>
                  </tr>
                </thead>
                <tbody>
									<?php
									include "../connection/connection.php";
									$sql = mysqli_query($conn, "SELECT*from log_wclass where status = 'Memasukkan Data Walikelas' order by tanggal asc");
									echo mysqli_error($conn);
									$no=1;
									while($d=mysqli_fetch_array($sql)){
										// $date = date('D, d M Y',strtotime($d['date']));
										echo "<tr>
											<td>$no</td>
											<td>$d[new_name]</td>
											<td>$d[new_class]</td>
											<td>$d[status]</td>
											<td>$d[tanggal]</td>
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
			<div class="col-xl-6 col-xxl-6 col-sm-12">
				<!-- delete wclass -->
					<div class="card bg-white p-2 mt-3 ms-1 me-3 mb-3 shadow" style="border-radius: 16px;">
						<div class="card-header bg-white" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
						<h4 class="card-title">Log Hapus Wali Kelas</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-responsive-md">
									<thead>
										<tr>
											<th style="width: 80px"><strong>#</strong></th>
											<th><strong>Nama</strong></th>
											<th><strong>Kelas</strong></th>
											<th><strong>Status</strong></th>
											<th><strong>Tanggal</strong></th>
											<th><strong>Admin</strong></th>
										</tr>
									</thead>
									<tbody>
										<?php
										include "../connection/connection.php";
										$sql = mysqli_query($conn, "SELECT*from log_wclass where status = 'Menghapus Data Walikelas' order by tanggal asc");
										echo mysqli_error($conn);
										$no=1;
										while($d=mysqli_fetch_array($sql)){
											// $date = date('D, d M Y',strtotime($d['date']));
											echo "<tr>
												<td>$no</td>
												<td>$d[old_name]</td>
												<td>$d[old_class]</td>
												<td>$d[status]</td>
												<td>$d[tanggal]</td>
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
		<!-- edit Wali Kelas -->
		<div class="row">
			<div class="col">
				<div class="card bg-white p-2 m-3 shadow" style="border-radius: 16px;">
					<div class="card-header bg-white" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
					<h4 class="card-title">Log Edit Wali Kelas</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-responsive-md">
								<thead>
									<tr>
										<th style="width: 80px"><strong>#</strong></th>
										<th><strong>Nama Lama</strong></th>
										<th><strong>Nama Baru</strong></th>
										<th><strong>Kelas Lama</strong></th>
										<th><strong>Kelas Baru</strong></th>
										<th><strong>Status</strong></th>
										<th><strong>Tanggal</strong></th>
										<th><strong>Admin</strong></th>
									</tr>
								</thead>
								<tbody>
									<?php
									include "../connection/connection.php";
									$sql = mysqli_query($conn, "SELECT*from log_wclass where status = 'Merubah Data Walikelas' order by tanggal asc");
									echo mysqli_error($conn);
									$no=1;
									while($d=mysqli_fetch_array($sql)){
										// $date = date('D, d M Y',strtotime($d['date']));
										echo "<tr>
											<td>$no</td>
											<td>$d[old_name]</td>
											<td>$d[new_name]</td>
											<td>$d[old_class]</td>
											<td>$d[new_class]</td>
											<td>$d[status]</td>
											<td>$d[tanggal]</td>
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
	</div>
</div>

<?php include "../footer/footer.php"; ?>