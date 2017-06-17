<?php

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
			<h1>Login to Your Account</h1>
			<form action="" method="post" id="login-form">
				<input type="text" placeholder="Email Address" name="email">
				<input type="password" placeholder="Password" name="password">
				<button type="submit">Login</button>
			</form>
		</div>
	</body>
</html>