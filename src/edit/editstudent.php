<?php include "../header/header.php"; ?>

<?php
	include "../connection/connection.php";

	$getDataSpp = mysqli_query($conn, "SELECT*from spp where nis = '$_GET[nis]'");
	$dataSpp = mysqli_fetch_array($getDataSpp);

	$getData = mysqli_query($conn, "SELECT * FROM student WHERE nis='$_GET[nis]'");
	$data = mysqli_fetch_array($getData);
?>

<div class="content-body" style="margin-top: 125px;">
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
    <!-- row -->
    <div class="row">
			<div class="col-xl-12 col-lg-24">
        <div class="card bg-white p-2 m-3 shadow" style="border-radius: 16px;">
          <div class="card-header bg-white" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
            <h4 class="card-title">Edit Data Siswa</h4>
          </div>
          <div class="card-body">
            <div class="basic-form">
						<form method="post" action="">
                      <div class="row">
                        <div class="mb-3 col-md-6">
                          <label class="form-label">NIS</label>
                          <input type="number" name="nis" class="form-control" maxlength="6" value="<?php echo $data['nis']; ?>" placeholder="NIS ex: 2212345xxx" />
                        </div>
                        <div class="mb-3 col-md-6">
                          <label class="form-label">Nama</label>
                          <input type="text" name="studentname" class="form-control" value="<?php echo $data['student_name']; ?>" placeholder="Nama Siswa ex: Ratna Permata" />
                        </div>
                        <div class="mb-3 col-md-6">
													<label class="form-label">Jenis Kelamin</label>
                          <select id="inputState" name="class" class="default-select form-control wide">
													<?php
											include "../connection/connection.php";

											$getDataGender = mysqli_query($conn, "SELECT * from student");
											while($dataGender = mysqli_fetch_array($getDataGender)){

												if($dataGender['jenis_kelamin'] == $data['jenis_kelamin']){
													$selected = "selected";
												}else{
													$selected ="";
												}
												?>
											<option value="<?php echo $dataGender['jenis_kelamin']; ?>" <?php echo $selected; ?>><?php echo $dataGender['jenis_kelamin']; ?></option>
										<?php
											}
										?>
                          </select>
                        </div>
                        <div class="mb-3 col-md-6">
													<label class="form-label">Kelas</label>
                          <select id="inputState" name="class" class="default-select form-control wide">
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
                          <input type="text" name="periode" class="form-control" value="<?php echo $data['periode']; ?>" readonly />
                        </div>
												<div class="mb-3 col-md-6">
													<label class="form-label">Biaya</label>
													<input type="text" name="sppcost" class="form-control" value="<?php echo $dataSpp['spp_cost']; ?>" readonly />
												</div>
												<div class="mb-3 col-md-6">
													<label class="form-label">Jatuh Tempo</label>
													<input type="date" name="duedate" class="form-control" value="<?php echo $dataSpp['duedate']; ?>" />
												</div>
												<div class="mb-3 col-md-6">
													<label class="form-label " style="display: none;">Status</label>
													<input type="text" name="status" style="display: none;" class="form-control" value="<?php echo $dataSpp['status']; ?>" readonly />
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

<?php include "../footer/footer.php" ?>