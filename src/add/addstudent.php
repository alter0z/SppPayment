<?php include "../header/header.php"; ?>


<div class="content-body" style="margin-top: 125px;">
  <div class="container-fluid">
		<div class="card bg-white ms-3 me-3 shadow" style="border-radius: 16px;">
			<div class="card-body">
			  <div class="">
					<a href="../index/admin.php" class="" style="text-decoration: none; color: rgb(131, 130, 130); font-weight: bold; font-size: larger;">Dashboard</a>
					<a href="../show/showdatastudent.php" class="" style="text-decoration: none; color: rgb(131, 130, 130); font-weight: bold; font-size: larger;"> / Data Siswa</a>
					<a href="javascript:void(0)" class="" style="text-decoration: none; color: #2196f3; font-weight: bold; font-size: larger;"> / Add Data Siswa</a>
          		</div>
			  </div>
		  </div>
	</div>

  <!-- <?php 
    if (isset($_SESSION['message']) == 'failed') {
      echo "<div class='alert alert-danger alert-dismissible fade show ms-4 me-4 mt-4'>
      <svg viewbox='0 0 24 24' width='24' height='24' stroke='currentColor' stroke-width='2' fill='none' stroke-linecap='round' stroke-linejoin='round' class='me-2'><polygon points='7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2'></polygon><line x1='15' y1='9' x2='9' y2='15'></line><line x1='9' y1='9' x2='15' y2='15'></line></svg>
      <strong>Oops!</strong> Data gagal disimpan.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='btn-close'></button>
      </div>";
    } else if (isset($_SESSION['message']) == 'empty') {
      echo "<div class='alert alert-warning alert-dismissible fade show ms-4 me-4 mt-4'>
      <svg viewbox='0 0 24 24' width='24' height='24' stroke='currentColor' stroke-width='2' fill='none' stroke-linecap='round' stroke-linejoin='round' class='me-2'><polygon points='7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2'></polygon><line x1='15' y1='9' x2='9' y2='15'></line><line x1='9' y1='9' x2='15' y2='15'></line></svg>
      <strong>Oops!</strong> Isi data dengan lengkap.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='btn-close'></button>
      </div>";
    }
  ?> -->
          <!-- row -->
          <div class="row">
					<div class="col-xl-12 col-lg-24">
              <div class="card bg-white p-2 m-4 shadow" style="border-radius: 16px;">
                <div class="card-header bg-white" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
                  <h4 class="card-title">Add Data Siswa</h4>
                </div>
                <div class="card-body">
                  <div class="basic-form">
                    <form method="post" action="../functions/get_add_student.php">
                      <div class="row">
                        <div class="mb-3 col-md-6">
                          <label class="form-label">NIS</label>
                          <input type="number" name="nis" class="form-control" maxlength="6" placeholder="NIS ex: 2212345xxx" />
                        </div>
                        <div class="mb-3 col-md-6">
                          <label class="form-label">Nama</label>
                          <input type="text" name="studentname" class="form-control" placeholder="Nama Siswa ex: Ratna Permata" />
                        </div>
                        <div class="mb-3 col-md-6">
													<label class="form-label">Jenis Kelamin</label>
                          <select id="inputState" name="gender" class="default-select form-control wide">
														<option value="">Pilih Jenis Kelamin</option>
														<option value="L">Laki-laki</option>
														<option value="P">Perempuan</option>
                          </select>
                        </div>
                        <div class="mb-3 col-md-6">
													<label class="form-label">Kelas</label>
                          <select id="inputState" name="class" class="default-select form-control wide">
														<option value="">Pilih Kelas</option>
														<?php
															include "../connection/connection.php";
															$getClass = mysqli_query($conn, "SELECT class from wclass order by class asc");
															while($data = mysqli_fetch_array($getClass)){
														?>
																<option value="<?php echo $data['class']; ?>"><?php echo $data['class']; ?></option>
														<?php
															}
														?>
                          </select>
                        </div>
												<div class="mb-3 col-md-6">
                          <label class="form-label">Tahun Ajaran</label>
                          <input type="text" name="periode" class="form-control" value="2021-2022" readonly />
                        </div>
												<div class="mb-3 col-md-6">
													<label class="form-label">Biaya</label>
													<input type="text" name="sppcost" class="form-control" value="250000" readonly />
												</div>
												<div class="mb-3 col-md-6">
													<label class="form-label">Jatuh Tempo</label>
													<input type="date" name="duedate" class="form-control" />
												</div>
												<div class="mb-3 col-md-6">
													<label class="form-label " style="display: none;">Status</label>
													<input type="text" name="status" style="display: none;" class="form-control" value="Belum Lunas" readonly />
												</div>
                      </div>
                      <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

<?php include "../footer/footer.php"; ?>