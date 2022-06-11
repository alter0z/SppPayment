<?php include "../header/header.php"; ?>
<div class="content-body" style="margin-top: 125px;">
	<div class="container-fluid">
<!-- page indicator -->
<div class="card bg-white ms-3 me-3 shadow" style="border-radius: 16px; margin-top: 125px;">
	<div class="card-body">
		<div class="">
			<a href="../index/admin.php" class="" style="text-decoration: none; color: rgb(131, 130, 130); font-weight: bold; font-size: larger;">Dashboard</a>
			<a href="javascript:void(0)" class="" style="text-decoration: none; color: #2196f3; font-weight: bold; font-size: larger;">/ Transaksi</a>
        </div>
	</div>
</div>

	<div class="row">
      <div class="col-lg-12">
		<div class="card bg-white p-2 m-3 shadow" style="border-radius: 16px;">
          <div class="card-header bg-white" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
				<h4 class="card-title">Transaksi</h4>
		  </div>
		  <div class="card-body">
            <div class="table-responsive">
              <table id="tabletrans" class="table table-responsive-md">
                <thead>
                  <tr>
                    <th style="width: 80px"><strong>#</strong></th>
                    <th><strong>NIS</strong></th>
                    <th><strong>Nama</strong></th>
                    <th><strong>Kelas</strong></th>
                    <th><strong>Jenis Kelamin</strong></th>
                    <th><strong>Wali Kelas</strong></th>
                    <th><strong>Status</strong></th>
                    <th><strong>Tanggal</strong></th>
                    <th><strong>Admin</strong></th>
                    <th><strong>Faktur</strong></th>
                  </tr>
                </thead>
                <tbody>
				<?php
					include "../connection/connection.php";
					$sql = mysqli_query($conn, "SELECT a.*, b.*, c.* FROM transaksi as a join student as b on a.nis = b.nis join wclass as c on b.class = c.class");
					echo mysqli_error($conn);
					$no=1;
					while($d=mysqli_fetch_array($sql)){
					echo "<tr>
					<td>$no</td>
					<td class='getNis'>$d[nis]</td>
					<td>$d[student_name]</td>
					<td>$d[class]</td>
					<td>$d[jenis_kelamin]</td>
					<td>$d[fullname]</td>
					<td>$d[spp_status]</td>
					<td>$d[tanggal]</td>
					<td>$d[admin]</td>
					<td><a class='btn btn-primary print-button'>Cetak</a></td>
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

<!-- modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->

<form method="post" action="../functions/printinvoice.php">
  <input type="hidden" name="nis" id="nis-print">
  <button type="submit" id="get-print" name="print" style="display: none;"></button>
</form>

<?php include "../footer/footer.php"; ?>