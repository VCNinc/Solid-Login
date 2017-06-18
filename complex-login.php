<?php
$users = [
	"vivek@solid2fa.com" => "password123"
];

// This login form is insecure.
// We know. That's the point.
// When you add SolidLogin, it becomes perfectly secure.

/*
if(password_verify($_POST['solid-login_hash'], "7jnrnDFh8xTqXm5oqX1P0EES" . $_POST['email'] . $_POST['password'] . "SolidLoginVERIFIED")) {
*/

	if(!empty($_POST)) {
		$error = "";
		if(!isset($_POST['email']) || empty($_POST['email'])) {
			$error = "Please enter your email address.";
		} else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$error = "Please enter a valid email address.";
		} else if (!isset($users[$_POST['email']])) {
			$error = "There's no user matching " . $_POST['email'];
		} else if(!isset($_POST['password']) || empty($_POST['password'])) {
			$error = "Please enter your password.";
		} else if($users[$_POST['email']] != $_POST['password']) {
			$error = "That's not the correct password.";
		} else {
			$logged_in = $_POST['email'];
		}
	}
	
/*
}
*/

$email = empty($_POST['email']) ? '' : $_POST['email'];
$password = empty($_POST['password']) ? '' : $_POST['password'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Complex Login Page</title>
		<link rel="stylesheet" href="assets/normal-login.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
	<body>
		<div class="navbar">
			<img src="assets/generic-logo.png">
			<i class="fa fa-bars" aria-hidden="true"></i>
		</div>
		<div class="login-form">
			<?php
			if(empty($logged_in)) {
			?>
				<h1>Login to Your Account</h1>
				<?php
				if(!empty($error)) {
				?>
				<div class="error">
					<p><i class="fa fa-exclamation-circle"></i> &nbsp; <?=$error?></p>
				</div>
				<?php
				}
				?>
				<form action="" method="post" id="login-form">
					<input type="text" placeholder="Email Address" name="email" value="<?=$email?>">
					<input type="password" placeholder="Password" name="password" value="<?=$password?>">
					<hr>
					<h4>Please answer Security Question 1:</h4>
					<input type="text" placeholder="Your Answer">
					<h4>Please answer Security Question 2:</h4>
					<input type="text" placeholder="Your Answer">
					<h4>Please answer Security Question 3:</h4>
					<input type="text" placeholder="Your Answer">
					<hr>
					<h4>What is your date of birth?</h4>
					<input type="text" placeholder="DD/MM/YYYY">
					<h4>When did you start using our service?</h4>
					<input type="text" placeholder="DD/MM/YYYY">
					<hr>
					<h4>Please verify that you are not a robot.</h4>
					<div class="g-recaptcha" data-sitekey="6LfK3iUUAAAAAHjv7jnrnDFh8xTqXm5oqX1P0EES"></div>
					<hr>
					<h4>Please enter the 2FA code sent to you via SMS.</h4>
					<input type="text" placeholder="Enter the 6-Digit Code">
					<h4>Please enter the 2FA code sent to you via Email.</h4>
					<input type="text" placeholder="Enter the 6-Digit Code">
					<hr>
					<h4>Please verify the billing address on file.</h4>
					<input type="text" placeholder="Address Line 1">
					<input type="text" placeholder="Address Line 2">
					<input type="text" placeholder="City, State, and ZIP Code">
					<hr>
					<h4>Please verify the Visa credit card number on file (4**************12).</h4>
					<input type="text" placeholder="Enter your 16-Digit Card Number">
					<button type="submit">Login</button>
				</form>
			<?php
			} else {
			?>
				<h1 class="mb0">Welcome back, <b><?=$logged_in?></b>.</h1>
				<p class="inf">You are now logged in to theCompany website.</p>
			<?php
			}
			?>
		</div>

		<!--
		<script src="assets/solid-login.js"></script>
		-->

	</body>
</html>