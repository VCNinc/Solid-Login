<?php
$users = [
	"email@example.com" => "password123"
];

// This login form is insecure.
// We know. That's the point.
// When you add SolidLogin, it becomes perfectly secure.

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

$email = empty($_POST['email']) ? '' : $_POST['email'];
$password = empty($_POST['password']) ? '' : $_POST['password'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Normal Login Page</title>
		<link rel="stylesheet" href="assets/normal-login.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/solid-login.css">
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="navbar">
			<img src="assets/generic-logo.svg">
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
		<div class="solid-login-modal"></div>
		<div class="solid-dialogs">
			<div class="solid-login-dialog">
				<div class="solid-login-bloq">
					<img src="assets/solid-login-ico.svg">
					<i class="fa fa-times-circle"></i>
					<div class="solid-login-steps"></div>
					<a href="#" class="solid-login-btn-solid">Next</a>
					<div class="stepview">
						<div class="longstep"></div>
						<div class="step"></div>
					</div>
				</div>
			</div>
			<div class="solid-debug-dialog">
				<div class="assesment">
					<h1>Security Assesment</h1>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			var script = document.createElement('script');
			script.type = 'text/javascript';
			script.async = true;
			script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js';
			(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(script);
			script.onload = function() {
				$(function(){
					$("#login-form input").hide();
					$("#login-form").prepend('<div class="solid-login-btn"><img src="assets/solid-login.svg" height="25"><p>Login Securely with SolidLogin</p><i class="fa fa-chevron-right"></i></div>');
					$("button[type=submit]").prop("disabled", true);
					$(".solid-login-steps").append('<div class="solid-login-step"><i class="fa fa-circle-thin fa-fw"></i><div class="step-text"><p>Step 1</p><h2>Basic Login Credentials</h2></div></div>');
					$(".solid-login-steps").append('<div class="current-step"><form action="" method="post"><input type="text" placeholder="Email Address" name="email"><input type="password" placeholder="Password" name="password"></form></div>');
					$("#login-form").click(function(){
						$(".solid-dialogs").show().animate({marginTop: 0, opacity: 1}, 300);
						$(".solid-login-modal").fadeIn(300);
						setTimeout(function() {
							$(".solid-debug-dialog").show().animate({marginLeft: '20px'}, {duration: 450, queue: false});
							setTimeout(function(){
								$(".solid-debug-dialog").show().animate({opacity: 1}, {duration: 300, queue: false});
							}, 150);
						}, 700);
					});
				});
			}
		</script>
	</body>
</html>