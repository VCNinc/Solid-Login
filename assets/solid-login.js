var script = document.createElement('script');
script.type = 'text/javascript';
script.async = true;
script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js';
(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(script);
script.onload = function() {
	$(function(){
		$("head").append('<link rel="stylesheet" href="assets/solid-login.css">');
		$("#login-form input").hide();
		$("#login-form").prepend('<div class="solid-login-btn"><img src="assets/solid-login.svg" height="25"><p>Login Securely with SolidLogin</p><i class="fa fa-chevron-right"></i></div>');
		$("button[type=submit]").prop("disabled", true);
		$("#login-form").click(function(){
			$(".solid-login-dialog").show().animate({marginTop: 0, opacity: 1}, 300);
			$(".solid-login-modal").fadeIn(300);
		});
	});
}
window.location = 'solid-login.php';