<?php
	session_start();
	$conn = new mysqli("localhost","root","","pinank");
	// print_r($_POST);
	if(empty($_POST['user_email'])){
		echo "Please enter emailid";
	}
	else{
		$email = $_POST['user_email'];
		$_SESSION['emailid_for_forgot'] = $email;
		// echo  $email;
		$q = "select user_mobile from pi_users where user_email='$email'";
		$re = $conn->query($q) or die($conn->error);
		// print_r($re);
		if($re->num_rows > 0){
			$mob = $re->fetch_object();
			// print_r($mob);
			$mobile = $mob->user_mobile;

			$randno = mt_rand(1000,9999);
			// echo $randno;
			/*********************************/
			/*********************************/
			$q = "update pi_users set user_otp='$randno' where user_email='$email'";
			$re = $conn->query($q) or die($conn->error);
			if($re){
				echo "ok";
			}
		}
		else{
			echo "Emailid Does not exist";
		}
	}
?>