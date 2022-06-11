<?php include "../header/header.php"; ?>

<div class="content-body" style="margin-top: 125px;">
        <div class="container-fluid">
		  <!-- page indicator -->
		  <div class="card bg-white ms-3 me-3 shadow" style="border-radius: 16px;">
			<div class="card-body">
			  <div class="">
				<a href="../index/admin.php" class="" style="text-decoration: none; color: rgb(131, 130, 130); font-weight: bold; font-size: larger;">Dashboard</a>
				<a href="javascript:void(0)" class="" style="text-decoration: none; color: #2196f3; font-weight: bold; font-size: larger;">/ Data Siswa</a>
           	  </div>
			</div>
		  </div>		
          <!-- row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card bg-white p-2 m-3 shadow" style="border-radius: 16px;">
                <div class="card-header bg-white" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
                  <div class="mb-3">
                    <div class="row">
                      <div class="col-8">
                        <a href="../add/addstudent.php" class="btn btn-primary d-sm-inline-block d-none" style="background-color: #2196f3;">Add Data</a>
                      </div>
                      <div class="col-1">
                        <button type="button" class="btn btn-success" id="import-stud">Import</button>
                      </div>
                      <div class="col-3">
                        <form method="POST" action="../functions/studimport.php" enctype="multipart/form-data">
                          <div class="form-group">
                            <input class="form-control" type="file" id="formFile" name="file">
                          </div>
                          <button type="submit" name="import-stud" id="import-stud-click" style="display: none;"></button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="tablestud" class="table table-responsive-md">
                      <thead>
                        <tr>
                          <th style="width: 80px"><strong>#</strong></th>
                          <th><strong>NIS</strong></th>
                          <th><strong>Nama</strong></th>
                          <th><strong>Jenis Kelamin</strong></th>
                          <th><strong>Kelas</strong></th>
                          <th><strong>Wali Kelas</strong></th>
                          <th><strong>Tahun Ajaran</strong></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
											<?php
												include "../connection/connection.php";

												$getData=mysqli_query($conn, "SELECT a.*, b.fullname FROM student as a inner join wclass as b on a.class = b.class order by class asc");
												$no=1;

                        $getNis;
                        $dataCount = 0;

												while($data = mysqli_fetch_array($getData)){
													echo "<tr>
                          <td><strong>$no</strong></td>
                          <td class='nis'>$data[nis]</td>
                          <td>$data[student_name]</td>
                          <td>$data[jenis_kelamin]</td>
                          <td>$data[class]</td>
                          <td>$data[fullname]</td>
                          <td>$data[periode]</td>
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
                                <a class='dropdown-item' href='../edit/editstudent.php?nis=$data[nis]'>Edit</a>
                                <a class='dropdown-item delete-stud'>Delete</a>
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

<!-- alert data student -->
<?php if (isset($_GET['message'])): ?>
  <input type="hidden" id="stud" value="<?php echo $_GET['message']; ?>"></input>
<?php endif; ?>

<form method="post" action="../delete/deletestudent.php">
  <input type="hidden" name="nis" id="nis">
  <button id="get-delete-stud" type="submit" name="delete-stud" style="display: none;">Delete</button>
</form>

<?php include "../footer/footer.php"; ?>