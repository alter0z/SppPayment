<?php include "../header/header.php"; ?>

<div class="content-body" style="margin-top: 125px;">
        <div class="container-fluid">
          <!-- page indicator -->
            <div class="card bg-white ms-3 me-3 shadow" style="border-radius: 16px;">
			        <div class="card-body">
			  	      <div class="">
					        <a href="../index/admin.php" class="" style="text-decoration: none; color: rgb(131, 130, 130); font-weight: bold; font-size: larger;">Dashboard</a>
					        <a href="javascript:void(0)" class="" style="text-decoration: none; color: #2196f3; font-weight: bold; font-size: larger;">/ Data Wali Kelas</a>
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
                      <a href="../add/addwclass.php" class="btn btn-primary d-sm-inline-block d-none" style="background-color: #2196f3;">Add Data</a>
                      </div>
                      <div class="col-3">
                        <form method="POST" action="excelUpload.php" enctype="multipart/form-data">
                          <div class="form-group">
                            <input class="form-control" type="file" id="formFile" name="file">
                          </div>
                        </form>
                      </div>
                      <div class="col">
                        <button type="button" class="btn btn-success">Import</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="tablewclass" class="table table-responsive-md">
                      <thead>
                        <tr>
                          <th style="width: 80px"><strong>#</strong></th>
                          <th><strong>Kelas</strong></th>
                          <th><strong>Fullname</strong></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
											<?php
												include "../connection/connection.php";

												$getData=mysqli_query($conn, "SELECT * FROM wclass ORDER BY class ASC");
												$no=1;

												while($data = mysqli_fetch_array($getData)){
													echo "<tr>
                          <td><strong>$no</strong></td>
                          <td class='class'>$data[class]</td>
                          <td>$data[fullname]</td>
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
                                <a class='dropdown-item' href='../edit/editwclass.php?class=$data[class]'>Edit</a>
                                <a class='dropdown-item delete-wclass'>Delete</a>
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

<!-- alert data user -->
<?php if (isset($_GET['message'])): ?>
  <input type="hidden" id="wclass" value="<?php echo $_GET['message']; ?>"></input>
<?php endif; ?>

<form method="post" action="../delete/deletewclass.php">
    <input type="hidden" name="class" id="class">
    <button id="get-delete-wclass" type="submit" name="delete-wclass" style="display: none;">Delete</button>
</form>

<?php include "../footer/footer.php"; ?>