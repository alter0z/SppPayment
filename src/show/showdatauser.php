<?php include "../header/header.php"; ?>

<!-- <h3>Data User</h3>
<a href="../add/adduser.php">Tambah Data</a>
<table border="1">
	<tr>
		<th>No</th>
		<th>Name</th>
		<th>Username</th>
		<th>Role</th>
		<th>Aksi</th>
	</tr>
	<?php
		include "../connection/connection.php";

		$getData=mysqli_query($conn, "SELECT * FROM user ORDER BY name ASC");
		$no=1;
		while($data = mysqli_fetch_array($getData)){
			echo "<tr>
				<td>$no</td>
				<td>$data[name]</td>
				<td>$data[username]</td>
				<td>$data[role]</td>
				<td>
					<a href='../edit/edituser.php?username=$data[username]'>Edit</a> /
					<a href='../delete/deleteuser.php?username=$data[username]'>Hapus</a>
				</td>
			</tr>";
			$no++;
		}
	?>
</table> -->

<div class="content-body">
        <div class="container-fluid">
          <!-- row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card bg-white p-2 m-3 shadow" style="border-radius: 16px;">
                <div class="card-header bg-white" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
									<a href="../add/adduser.php" class="btn btn-primary d-sm-inline-block d-none" style="background-color: #2196f3;">Add Data</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-responsive-md">
                      <thead>
                        <tr>
                          <th style="width: 80px"><strong>#</strong></th>
                          <th><strong>Name</strong></th>
                          <th><strong>Username</strong></th>
                          <th><strong>Role</strong></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
											<?php
												include "../connection/connection.php";

												$getData=mysqli_query($conn, "SELECT * FROM user ORDER BY name ASC");
												$no=1;
												while($data = mysqli_fetch_array($getData)){
													echo "<tr>
                          <td><strong>$no</strong></td>
                          <td>$data[name]</td>
                          <td>$data[username]</td>
                          <td>$data[role]</td>
                          <td>
                            <div class='dropdown'>
                              <button type='button' class='btn btn-outline-primary light sharp' data-bs-toggle='dropdown' style='border-radius: 16px;'>
                                <svg width='20px' height='20px' viewbox='0 0 24 24' version='1.1'>
                                  <g stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
                                    <rect x='0' y='0' width='24' height='24'></rect>
                                    <circle fill='#000000' cx='5' cy='12' r='2'></circle>
                                    <circle fill='#000000' cx='12' cy='12' r='2'></circle>
                                    <circle fill='#000000' cx='19' cy='12' r='2'></circle>
                                  </g>
                                </svg>
                              </button>
                              <div class='dropdown-menu shadow' style='border-radius: 16px;'>
                                <a class='dropdown-item' href='../edit/edituser.php?username=$data[username]'>Edit</a>
                                <a class='dropdown-item' href='../delete/deleteuser.php?username=$data[username]'>Delete</a>
                              </div>
                            </div>
                          </td>
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