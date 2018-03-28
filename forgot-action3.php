<?php
	session_start();
	$conn = new mysqli("localhost","root","","pinank");
	// print_r($_POST);
	// print_r($_SESSION);

	if(empty($_POST['user_passsword']) || empty($_POST['user_cpasssword']) || $_POST['user_passsword']!=$_POST['user_cpasssword'] ){
		echo "Please enter valid passwords";
	}
	else{
		$email = $_SESSION['emailid_for_forgot'];
		// echo $email;
		$newpass = sha1($_POST['user_passsword']);
		$q = "update pi_users set user_password='$newpass',user_otp=0 where user_email='$email'";
		$re = $conn->query($q) or die($conn->error);
		if($re){
			echo "ok";
		}
	}
?>	