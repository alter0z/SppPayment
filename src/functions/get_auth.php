<?php
  ob_start();
	session_start();
	if (!isset($_SESSION['login'])) {
		header('location:../auth/login.php?message=view');
	} else {
		if (isset($_SESSION['login']) && $_SESSION['role'] == "walikelas") {
			header('location:../show/showdatastudent.bywclass.php?message=view');
		}
	}
?>