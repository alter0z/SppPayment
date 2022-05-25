<?php include "../header/header.php"; ?>
<div class="content-body">
	<div class="container-fluid">
		 <!-- page indicator -->
		 <div class="card bg-white ms-3 me-3 shadow" style="border-radius: 16px;">
			  <div class="card-body">
			  	<div class="">
					<a href="../index/admin.php" class="" style="text-decoration: none; color: rgb(131, 130, 130); font-weight: bold; font-size: larger;">Dashboard</a>
					<a href="../show/showdatauser.php" class="" style="text-decoration: none; color: rgb(131, 130, 130); font-weight: bold; font-size: larger;"> / Data User</a>
					<a href="javascript:void(0)" class="" style="text-decoration: none; color: #2196f3; font-weight: bold; font-size: larger;"> / Add Data User</a>
          		</div>
			  </div>
		  </div>
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-lg-12">
		<div class="card bg-white p-4 m-4 shadow"style="border-radius: 16px;">
		<div class="card-header bg-white" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
				<h4 class="card-title">Add Data User</h4>
                </div>


		<form class="row g-3" method="post" action="../functions/get_add_user.php">
		<div class="col-md-6">
    		<label class="form-label">Fullname</label>
    		<input type="text" class="form-control" name="fullname" placeholder="John Doe">
  		</div>
		  <div class="col-md-6">
    		<label class="form-label">Username</label>
    		<input type="text" class="form-control" name="username" placeholder="johndoe123">
  		</div>
    
		  <div class="col-md-6">
    		<label class="form-label">Password</label>
    		<input type="text" class="form-control" name="password" placeholder="Password">
  		</div>
		  <div class="col-md-6">
    		<label class="form-label">Role</label>
    		<select class="form-select" name="role">
						<option value="null" selected>- Pilih Role -</option>
						<?php
							include "../connection/connection.php";
							$getRole = mysqli_query($conn, "SELECT * from roles");
							while($data = mysqli_fetch_array($getRole)){
						?>
							<option value="<?php echo $data['role']; ?>"><?php echo $data['role']; ?></option>
						<?php
							}
						?>
					</select>
  		</div>
		  <div class="col-12">
    			<button type="submit" class="btn btn-primary">Simpan</button>
  		  </div>
			
		
		</form>
		<?php include "../functions/get_add_user.php"; ?>
		</div>
		</div>
	</div>
</div>


<?php include "../footer/footer.php"; ?>