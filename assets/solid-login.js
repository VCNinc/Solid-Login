var script = document.createElement('script');
script.type = 'text/javascript';
script.async = true;
script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js';
(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(script);
script.onload = function() {
	$(function(){
		$("head").append('<link rel="stylesheet" href="assets/solid-login.css">');
		$("#login-form input").hide();
		$("#login-form").prepend('<div class="solid-login-btn"><img src="assets/solid-login.svg"><p>Login Securely with SolidLogin</p><i class="fa fa-chevron-right"></i></div>');
		$("button[type=submit]").prop("disabled", true);
		$("body").append('<div class="solid-login-modal"></div><div class="solid-login-dialog"><div class="solid-login-bloq"><img src="assets/solid-login-ico.png"><i class="fa fa-times-circle"></i><div class="solid-login-steps"></div><a href="#" class="solid-login-btn-solid">Next</a><div class="stepview"><div class="longstep"></div><div class="step"></div></div></div></div>');
		$(".solid-login-steps").append('<div class="solid-login-step"><i class="fa fa-circle-thin fa-fw"></i><div class="step-text"><p>Step 1</p><h2>Basic Login Credentials</h2></div></div>');
		$(".solid-login-steps").append('<div class="current-step"><form action="" method="post"><input type="text" placeholder="Email Address" name="email"><input type="password" placeholder="Password" name="password"></form></div>');
		$("#login-form").click(function(){
			alert("Start Secure Login!");
		});
	});
}