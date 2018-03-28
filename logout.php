<?php
	session_start();
	session_regenerate_id(true);
	unset($_SESSION['pro_id']);
	unset($_SESSION['pro_name']);
	unset($_SESSION['pro_mobile']);
	unset($_SESSION['pro_email']);
	session_destroy();

	header("location:login.php");
?>