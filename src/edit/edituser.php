<?php include "../header/header.php"; ?>

<?php
	include "../connection/connection.php";

	$getData = mysqli_query($conn, "SELECT * FROM user WHERE username='$_GET[username]'");
	$data = mysqli_fetch_array($getData);
?>

<div class="content-body" style="margin-top: 125px;">
  <div class="container-fluid">
		<div class="card bg-white ms-3 me-3 shadow" style="border-radius: 16px;">
			<div class="card-body">
			  <div class="">
					<a href="../index/admin.php" class="" style="text-decoration: none; color: rgb(131, 130, 130); font-weight: bold; font-size: larger;">Dashboard</a>
					<a href="../show/showdatauser.php" class="" style="text-decoration: none; color: rgb(131, 130, 130); font-weight: bold; font-size: larger;"> / Data User</a>
					<a href="javascript:void(0)" class="" style="text-decoration: none; color: #2196f3; font-weight: bold; font-size: larger;"> / Edit Data User</a>
        </div>
			</div>
		</div>
    <!-- row -->
    <div class="row">
			<div class="col-xl-12 col-lg-24">
        <div class="card bg-white p-2 m-3 shadow" style="border-radius: 16px;">
          <div class="card-header bg-white" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
            <h4 class="card-title">Edit Data User</h4>
          </div>
          <div class="card-body">
            <div class="basic-form">
						<form method="post" action="">
                      <div class="row">
                        
                        <div class="mb-3 col-md-6">
                          <label class="form-label">Nama</label>
						  <input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>" />
                        </div>
						<div class="mb-3 col-md-6">
                          <label class="form-label">Username</label>
						  <input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>" />
                        </div>
						
                        <div class="mb-3 col-md-6">
						<label class="form-label">Role</label>
						<select id="inputState" name="role" class="default-select form-control wide" >
						<?php
						include "../connection/connection.php";

						$getDatac = mysqli_query($conn, "SELECT * from roles");
						while($datac = mysqli_fetch_array($getDatac)){

						if($datac['role'] == $data['role']){
							$selected = "selected";
						}else{
							$selected ="";
						}

				?>
					<option value="<?php echo $datac['role']; ?>" <?php echo $selected; ?>><?php echo $datac['role']; ?></option>
				<?php
					}
				?>
			</select>
                        </div>
							<div class="mb-3 col-md-6">
                          <label class="form-label">Password</label>
						  <input type="password" name="password" class="form-control" value="<?php echo $data['password']; ?>" />
                          
                        </div>
												
                      </div>
                      <button type="submit" class="btn btn-primary">Save</button>
                    </form>
							<?php include "../functions/get_edit_user.php"; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- alert edit user -->
<?php if (isset($_GET['message'])): ?>
  <input type="hidden" id="user" value="<?php echo $_GET['message']; ?>"></input>
<?php endif; ?>

<?php include "../footer/footer.php" ?>