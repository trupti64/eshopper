<?php
	session_start();
	$conn = new mysqli("localhost","root","","pinank");
	// print_r($_POST);
	if(empty($_POST['cpass']) || empty($_POST['npass']) || empty($_POST['cnpass'])){
		$msg = "Please Enter all password";
	}
	else if($_POST['npass']!=$_POST['cnpass']){
		$msg = "new pass & confirm new pass mismatch";
	}
	else if($_POST['cpass']==$_POST['npass']){
		$msg = "new pass sholud be diff from current password";
	}
	else{
		// print_r($_SESSION);
		$email = $_SESSION['pro_email'];
		// echo $email;
		$q = "select user_password from pi_users where user_email='$email'";
		// echo $q;
		$res = $conn->query($q) or die($conn->error);
		// print_r($res);
		$ans = $res->fetch_array(MYSQLI_ASSOC);
		// print_r($ans);
		$dbpass = $ans['user_password'];
		// echo $dbpass;

		if($dbpass != sha1($_POST['cpass'])){
			$msg = "invalid current password";
		}
		else{
			$newpass = sha1($_POST['npass']);
			$q = "update pi_users set user_password='$newpass' where  user_email='$email' ";
			// echo $q;
			$res = $conn->query($q) or die($conn->error);
			if($res){
				$msg="ok";
			}

		}
	}

	echo $msg;
?>