<?php include "../header/header.php"; ?>
<div class="content-body" style="margin-top: 125px;">
        <div class="container-fluid">
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
					<div class="col-xl-12 col-lg-24">
					<div class="card bg-white p-2 m-4 shadow"style="border-radius: 16px;">
					<div class="card-header bg-white" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
                  <h4 class="card-title">Add Data User</h4>
                </div>
                <div class="card-body">
                  <div class="basic-form">
                    <form method="post" action="">
                      <div class="row">
                        <div class="mb-3 col-md-6">
                          <label class="form-label">Fullname</label>
                          <input type="text" name="fullname" class="form-control" placeholder="John Doe" />
                        </div>
                        <div class="mb-3 col-md-6">
                          <label class="form-label">Username</label>
                          <input type="text" name="username" class="form-control" placeholder="user123" />
                        </div>
                        <div class="mb-3 col-md-6">
                          <label class="form-label">Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" />
                        </div>
                        <div class="mb-3 col-md-6">
													<label class="form-label">Role</label>
                          <select id="inputState" name="role" class="default-select form-control wide">
                            <option value="" selected="">Pilih Role...</option>
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
                      </div>
                      <button type="submit" class="btn btn-primary">Save</button>
                    </form>
										<?php include "../functions/get_add_user.php"; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


<?php include "../footer/footer.php"; ?>