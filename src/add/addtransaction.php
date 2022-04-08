<?php include "./header/header.php"; ?>

<!-- here is from input field -->

<?php
	if( $_SERVER['REQUEST_METHOD']=='POST') {
		
		$nis = mysqli_real_escape_string($conn, $_POST['nis']);
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$class = mysqli_real_escape_string($conn, $_POST['class']);
		$wclass = mysqli_real_escape_string($conn, $_POST['wclass']);
		$statues = mysqli_real_escape_string($conn, $_POST['statues']);
		
		if ($statues == null) {
			echo "Form belum lengkap!!!";
		} else {
			addTransaction($nis, $name, $class, $wclass, $statues);
		}
	}
?>

<?php include "footer.php"; ?>