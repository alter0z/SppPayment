<?php include "../header/header.php"; ?>

<?php
	include "../connection/connection.php";

	$getData = mysqli_query($conn, "SELECT * FROM wclass WHERE class='$_GET[class]'");
	$data = mysqli_fetch_array($getData);
?>

<div class="content-body">
  <div class="container-fluid">
		<div class="card bg-white ms-3 me-3 shadow" style="border-radius: 16px;">
			<div class="card-body">
			  <div class="">
					<a href="../index/admin.php" class="" style="text-decoration: none; color: rgb(131, 130, 130); font-weight: bold; font-size: larger;">Dashboard</a>
					<a href="../show/showdatawclass.php" class="" style="text-decoration: none; color: rgb(131, 130, 130); font-weight: bold; font-size: larger;"> / Data Walikelas</a>
					<a href="javascript:void(0)" class="" style="text-decoration: none; color: #2196f3; font-weight: bold; font-size: larger;"> / Edit Data Walikelas</a>
        </div>
			</div>
		</div>
    <!-- row -->
    <div class="row">
			<div class="col-xl-12 col-lg-24">
        <div class="card bg-white p-2 m-3 shadow" style="border-radius: 16px;">
          <div class="card-header bg-white" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
            <h4 class="card-title">Edit Data Walikelas</h4>
          </div>
          <div class="card-body">
            <div class="basic-form">
						<form method="post" action="">
                      <div class="row">
                        <div class="mb-3 col-md-6">
						<label class="form-label">Role</label>
						 
						<select name="class" id="inputState" class="default-select form-control wide">
							<option value="null">Pilih Kelas</option>
							<option value="10-A">10-A</option>
							<option value="10-B">10-B</option>
							<option value="10-C">10-C</option>
							<option value="10-D">10-D</option>
							<option value="10-E">10-E</option>
							<option value="10-F">10-F</option>
							<option value="11-A">11-A</option>
							<option value="11-B">11-B</option>
							<option value="11-C">11-C</option>
							<option value="11-D">11-D</option>
							<option value="11-E">11-E</option>
							<option value="11-F">11-F</option>
							<option value="12-A">12-A</option>
							<option value="12-B">12-B</option>
							<option value="12-C">12-C</option>
							<option value="12-D">12-D</option>
							<option value="12-E">12-E</option>
							<option value="12-F">12-F</option>
						</select>
                        </div>
							<div class="mb-3 col-md-6">
                          <label class="form-label">Fullname</label>
						  <input type="text" name="fullname" class="form-control" value="<?php echo $data['fullname']; ?>" />
                          
                        </div>
												
                      </div>
                      <button type="submit" class="btn btn-primary">Save</button>
                    </form>
							<?php include "../functions/get_edit_wclass.php"; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include "../functions/get_edit_wclass.php" ?>

<?php include "../footer/footer.php"; ?>