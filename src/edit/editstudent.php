<?php include "../header/header.php"; ?>

<?php
	include "../connection/connection.php";

	$getData = mysqli_query($conn, "SELECT * FROM student WHERE nis='$_GET[nis]'");
	$data = mysqli_fetch_array($getData);

	$getDataSpp = mysqli_query($conn, "SELECT * FROM spp WHERE nis='$_GET[nis]'");
	$dataSpp = mysqli_fetch_array($getDataSpp);
?>





<div class="content-body">
  <div class="container-fluid">
		<div class="card bg-white ms-3 me-3 shadow" style="border-radius: 16px;">
			<div class="card-body">
			  <div class="">
					<a href="../index/admin.php" class="" style="text-decoration: none; color: rgb(131, 130, 130); font-weight: bold; font-size: larger;">Dashboard</a>
					<a href="../show/showdatastudent.php" class="" style="text-decoration: none; color: rgb(131, 130, 130); font-weight: bold; font-size: larger;"> / Data Siswa</a>
					<a href="javascript:void(0)" class="" style="text-decoration: none; color: #2196f3; font-weight: bold; font-size: larger;"> / Edit Data Siswa</a>
          		</div>
			  </div>
		  </div>
	</div>
          <!-- row -->
          <div class="row">
					<div class="col-xl-12 col-lg-24">
              <div class="card bg-white p-4 m-4 shadow" style="border-radius: 16px;">
                <div class="card-header bg-white" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
                  <h4 class="card-title">Edit Data Siswa</h4>
                </div>
                <div class="card-body">
                  <div class="basic-form">
                    <form method="post" action="">
                      <div class="row">
                        <div class="mb-3 col-md-6">
                          <label class="form-label">NIS</label>
                          <input type="number" name="getnis" maxlength="6" value="<?php echo $data['nis']; ?>" placeholder="NIS ex: 2212345xxx" />
                        </div>
                        <div class="mb-3 col-md-6">
                          <label class="form-label">Nama</label>
                          <input type="text" name="studentname" value="<?php echo $data['student_name']; ?>" placeholder="Nama Siswa ex: Ratna Permata" />
                        </div>
                        <div class="mb-3 col-md-6">
						<label class="form-label">Kelas</label>
						<select name="class" id="add-class">
					<?php
					include "../connection/connection.php";

					$getDatac = mysqli_query($conn, "SELECT * from wclass order by class ASC");
					while($datac = mysqli_fetch_array($getDatac)){

						if($datac['class'] == $data['class']){
							$selected = "selected";
						}else{
							$selected ="";
						}

							?>
					<option value="<?php echo $datac['class']; ?>" <?php echo $selected; ?>><?php echo $datac['class']; ?></option>
							<?php
							}
							?>
							</select>
                        </div>
						<div class="mb-3 col-md-6">
                          <label class="form-label">Tahun Ajaran</label>
                          <input type="text" name="periode" value="<?php echo $data['periode']; ?>" id="add-ta" />
                        </div>
							<div class="mb-3 col-md-6">
								<label class="form-label">Biaya</label>
								<input type="text" name="sppcost" value="<?php echo $dataSpp['spp_cost']; ?>" id="add-spp" />
							</div>
							<div class="mb-3 col-md-6">
								<label class="form-label">Jatuh Tempo</label>
								<input type="date" name="duedate" value="<?php echo $dataSpp['duedate']; ?>" />
							</div>
							<div class="mb-3 col-md-6">
								<label class="form-label " style="display: none;">Status</label>
								<input type="text" name="status" value="<?php echo $dataSpp['status']; ?>" style="display: none;" id="add-t" readonly />
							</div>
                      </div>
                      <button type="submit" class="btn btn-primary">Save</button>
                    </form>
										<?php include "../functions/get_edit_student.php"; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

<?php include "../functions/get_edit_student.php" ?>

<?php include "../footer/footer.php" ?>