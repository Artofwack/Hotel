<?php
/**
 * File: adminlogon.php
 *
 * Created by PhpStorm.
 * User: ArtofWack
 * Date: 1/22/2016
 * Time: 4:59 PM
 */

session_destroy();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Login</title>
	<link rel="stylesheet" href="../UIKit/css/uikit.almost-flat.min.css">
</head>
<body>

<div class="uk-vertical-align uk-text-center">
	<div class="uk-vertical-align-middle" style="width: 300px;">

		<form class="uk-panel uk-panel-box uk-form">
			<div class="uk-form-row">
				<input class="uk-width-1-1 uk-form-large" type="text" id="username" placeholder="Username">
			</div>
			<div class="uk-form-row">
				<input class="uk-width-1-1 uk-form-large" type="email" id="email" placeholder="Email">
			</div>
			<div class="uk-form-row">
				<input class="uk-width-1-1 uk-form-large" type="password" id="pass" placeholder="Password">
			</div>
			<div class="uk-form-row">
				<a class="uk-width-1-1 uk-button uk-button-primary uk-button-large loginButton" href="#">Login</a>
			</div>
		</form>
	</div>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../UIKit/js/uikit.min.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script>
	$(document).ready(function () {
		$('form').validate();
		/* Log in using ajax post request */
		$('.loginButton').on('click', function () {
			$.post('adminLogIn.php', {
				'username': $('#username').val(),
				'email': $('#email').val(),
				'pass': $('#pass').val()
			}, function () {
				window.location = '../admin.php';
			});
		});
	});
</script>
</body>
</html>
