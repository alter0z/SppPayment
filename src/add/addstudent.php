<?php include "../header/header.php"; ?>


<div class="content-body">
	<div class="container-fluid">
		 <!-- page indicator -->
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
	<!-- row -->
	<div class="row">
		<div class="col-lg-12">
		<div class="card bg-white p-4 m-4 shadow"style="border-radius: 16px;">
		<div class="card-header bg-white" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
				<h4 class="card-title">Add Data Siswa</h4>
                </div>


		<form class="row g-3" method="post" action="../functions/get_add_student.php">
		<div class="col-md-6">
    		<label class="form-label">NIS</label>
    		<input type="text" class="form-control" name="nis" id="add-nis" maxlength="6" placeholder="NIS ex: 2212345xxx">
  		</div>
		  <div class="col-md-6">
    		<label class="form-label">Nama Siswa</label>
    		<input type="text" class="form-control" name="studentname" id="add-ns" placeholder="Nama Siswa ex: Ratna Permata">
  		</div>
    
		  
		  <div class="col-md-6">
    		<label class="form-label">Kelas</label>
    		
					<select name="class" id="add-class">
			<option value="null" selected>- Pilih Kelas -</option>
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
		  <div class="col-md-6">
    		<label class="form-label">Tahun Ajaran</label>
    		<input type="text" name="periode" value="2021-2022"  id="add-ta" readonly />
  		</div>
		  <div class="col-md-6">
    		<label class="form-label">Jumlah Tagihan SPP</label>
    		<input type="text" name="sppcost" value="250000"  id="add-spp" readonly />
  		</div>
		  <div class="col-md-6">
    		<label class="form-label">Jatuh Tempo</label>
    		<input type="date" name="duedate" />
  		</div>
		  <div class="col-md-6">
    		<input type="text" name="status" value="Belum Lunas" style="display: none;" id="add-t" readonly />
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





<?php include "../functions/get_add_student.php"; ?>

<?php include "../footer/footer.php"; ?>