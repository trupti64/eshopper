<?php
	session_start();
	$conn = new mysqli("localhost","root","","pinank");
	// print_r($_POST);
	// print_r($_SESSION);

	if(empty($_POST['user_otp']) || !ctype_digit($_POST['user_otp']) || strlen($_POST['user_otp'])!=4 ){
		echo "Invalid OTP";
	}
	else{
		$otp = $_POST['user_otp'];
		// echo $otp;
		$email = $_SESSION['emailid_for_forgot'];
		$q = "select user_otp from pi_users where user_email='$email'";
		$re = $conn->query($q) or die($conn->error);
		$otpdata = $re->fetch_object();
		// print_r($otpdata);
		if($otpdata->user_otp != $otp){
			echo "OTP Mismatch";
		}
		else{
			echo "ok";
		}
	}
?>