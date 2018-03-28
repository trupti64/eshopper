<?php

	session_start();
	if(isset($_SESSION['pro_name'])){
		header("location:index.php");	
	}

	require_once 'header.php';
?>
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>ForGot Password Form</h2>

								<form id="forgot1_form">
								<input type="text" name="user_email" placeholder="sumit@gmail.com"><br/>	
								<input type="button" value="Send OTP" class="btn_forgot1" />
								</form>

								<form id="forgot2_form">
								<input type="text" name="user_otp" placeholder="Enter OTP "><br/>
								<input type="button" value="Check OTP" class="btn_forgot2" />
								</form>

								<form id="forgot3_form">
								<input type="password" name="user_passsword" placeholder="New password"><br/>
								<input type="password" name="user_cpasssword" placeholder="Confirm New Password"><br/>
								<input type="button" value="Update Password" class="btn_forgot3" />
								</form>

								<div class="msg">hello</div>
					</div><!--/login form-->
				</div>
				
			</div>
		</div>
	</section>
<?php
	require_once 'footer.php';
?>