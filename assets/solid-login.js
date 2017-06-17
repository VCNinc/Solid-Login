var script = document.createElement('script');
script.type = 'text/javascript';
script.async = true;
script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js';
(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(script);
script.onload = function() {
	$(function(){
		$("head").append('<link rel="stylesheet" href="assets/solid-login.css">');
		$("#login-form input").hide();
		$("#login-form").prepend('<div class="solid-login-btn"><img src="assets/solid-login.png"><p>Login Securely with SolidLogin</p><i class="fa fa-chevron-right"></i></div>');
		$("#login-form").click(function(){
			alert("Start Secure Login!");
		});
	});
}