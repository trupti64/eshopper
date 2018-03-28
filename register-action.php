<?php
	$conn = new mysqli("localhost","root","","pinank");
	// print_r($_POST);
	if(empty($_POST['user_name'])){
		$msg = "Please Enter name";
	}
	else if(empty($_POST['user_mobile'])){
		$msg = "Please Enter mobile";
	}
	else if(empty($_POST['user_email'])){
		$msg = "Please Enter emailid";
	}
	else if(empty($_POST['user_passsword'])){
		$msg = "Please Enter password";
	}
	else if($_POST['user_cpasssword']!=$_POST['user_passsword']){
		$msg = "Please Enter confirm password";
	}
	else{
		$uname = $conn->real_escape_string(strip_tags(trim($_POST['user_name'])));
		$umob = $conn->real_escape_string(strip_tags(trim($_POST['user_mobile'])));
		$uemail = $conn->real_escape_string(strip_tags(trim($_POST['user_email'])));
		$upass = sha1( $conn->real_escape_string(strip_tags(trim($_POST['user_passsword']))) );

		// echo $upass;

		$q = "select count(user_email) as cnt from pi_users where user_email='$uemail' ";
		// echo $q;
		$res = $conn->query($q) or die($conn->error);
		// print_r($res);
		$anscnt = $res->fetch_array(MYSQLI_ASSOC);
		// print_r($anscnt);
		if($anscnt['cnt'] > 0){
			$msg = "emailid exist";
		}
		else{
			$q = "insert into pi_users (user_name,user_mobile,user_email,user_password) values ('$uname','$umob','$uemail','$upass')";

			$conn->query($q) or die($conn->error);
			// SMS & EMAIL
			/*************************************************/
			// $numbers = "91$umob"; // A single number or a comma-seperated list of numbers
			// $message = "Welcome to PHP Project , You are registered with us";
			// $message = urlencode($message);
			// $url = "http://api.textlocal.in/send/?username=aniket.mkl98@gmail.com&hash=338705c74b9a631ba8546140cc075bdc092afe4a4e7cf0c0c4bf58feb591c53b&message=$message&sender=TXTLCL&numbers=$numbers&test=0";

			// // echo $url;

			// $result=file($url);
			// print_r($result);
			$message = "Welcome to PHP Project , You are registered with us";
			$to = $uemail;
			$subject = "My subject";
			$txt = $message;
			$headers = "From: <vishal@php-training.in>";
			$mailans =mail($to,$subject,$txt,$headers);
			var_dump($mailans);
			/*************************************************/
			$msg= "ok";
		}

	}
	echo $msg;
?>