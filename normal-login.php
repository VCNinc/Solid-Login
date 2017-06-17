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
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
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
					<input type="text" placeholder="Email Address" name="email">
					<input type="password" placeholder="Password" name="password">
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
	</body>
</html>