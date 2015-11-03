<?php
/**
 * File: reserve.php
 *
 * Created by PhpStorm.
 * User: ArtofWack
 * Date: 10/27/2015
 * Time: 7:58 PM
 */

require_once("../config.php");
require_once("../scrypt.php");

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Hotel California</title>

	<!-- Bootstrap core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">

	<!-- Bootstrap Cosmo Theme CSS
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/cosmo/bootstrap.min.css" rel="stylesheet"
	        integrity="sha256-IF1P9CSIVOaY4nBb5jATvBGnxMn/4dB9JNTLqdxKN9w= sha512-UsfHxnPESse3RgYeaoQ7X2yXYSY5f6sB6UT48+F2GhNLqjbPhtwV2WCUQ3eQxeghkbl9PioaTOHNA+T0wNki2w=="
	        crossorigin="anonymous">
	-->

	<!-- Custom styles for this template -->
	<link href="../css/hotel.css" rel="stylesheet">
</head>

<body>
<!-- ========== Log in modal ========== -->
<div class="modal fade" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close loginClose" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Log in</h4>
			</div>
			<div class="modal-body">
				<!-- ================ Form ================ -->
				<form class="form-horizontal" id="loginForm">
					<div class="form-group">
						<label for="email" class="col-sm-4 control-label">Email</label>

						<div class="col-sm-6">
							<input type="email" class="form-control" name="email" id="email" placeholder="Email"
							       required>
						</div>
					</div>
					<div class="form-group">
						<label for="pass" class="col-sm-4 control-label">Password</label>

						<div class="col-sm-6">
							<input type="password" class="form-control" name="pass" id="pass" placeholder="Password"
							       required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-5">
							<button type="button" class="btn btn-primary loginButton">Sign in</button>
						</div>
					</div>
				</form>

			</div>
			<div class="modal-footer">
				<span id="notice"></span>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>


<!-- ========== Register modal ========== -->
<div class="modal fade" id="registerModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Register</h4>
			</div>
			<div class="modal-body well">
				<!-- ================ Form ================ -->
				<form class="form-horizontal">
					<div class="form-group">
						<label for="firstName" class="col-sm-4 control-label">First Name</label>

						<div class="col-sm-6">
							<input type="text" class="form-control" name="firstName" id="firstName"
							       placeholder="First Name"
							       required autofocus>
						</div>
					</div>
					<div class="form-group">
						<label for="lastName" class="col-sm-4 control-label">Last Name</label>

						<div class="col-sm-6">
							<input type="text" class="form-control" name="lastName" id="lastName"
							       placeholder="Last Name" required>
						</div>
					</div>
					<div class="form-group">
						<label for="regEmail" class="col-sm-4 control-label">Email</label>

						<div class="col-sm-6">
							<input type="email" class="form-control" name="regEmail" id="regEmail" placeholder="Email"
							       required>
						</div>
					</div>
					<div class="form-group">
						<label for="regPass" class="col-sm-4 control-label">Password</label>

						<div class="col-sm-6">
							<input type="password" class="form-control" name="regPass" id="regPass"
							       placeholder="Password"
							       required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-5 col-sm-3">
							<button type="button" class="btn btn-primary regButton">Register</button>
						</div>
					</div>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>


<!-- ================ NAV Bar ================ -->
<div class="navbar-wrapper">
	<div class="container">
		<nav class="navbar navbar-inverse navbar-static-top" id="nav">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
					        aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Hotel California</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="hotel.php">Home</a></li>
						<li><a href="#about">About</a></li>
						<li><a href="#contact">Contact</a></li>
						<li><a href="#" data-toggle="modal" data-target="#registerModal">Register</a></li>
						<li class="dropdown active">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
							   aria-haspopup="true" aria-expanded="false">Reservations<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li class="dropdown-header">New Reservations</li>
								<li><a href="reserve.php">New Reservation</a></li>
								<li><a href="index.php">Check Availability</a></li>
								<li><a href="#">Dining Reservations</a></li>
								<li class="divider"></li>
								<li class="dropdown-header">Existing Reservations</li>
								<li><a href="#">Check Reservation</a></li>
								<li><a href="#">Cancel Reservation</a></li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<!--<a href="signIn.php">Welcome<?php echo isset($_SESSION['username']) ? ", " . $_SESSION['username'] : "! Please Register or Sign In" ?></a>
							-->
							<a href="#" id="login" data-toggle="modal"
							   data-target="#myModal">Welcome<?php echo isset($_SESSION['username']) ? ", " . $_SESSION['username'] : "! Please Sign In" ?></a>
						</li>
						<li>
							<a href="logout.php" class="glyphicon glyphicon-log-out signOut"></a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
</div>


<!-- ================ Reserve ================ -->
<div class="container under-nav">
	<div class="row btn-group">
		<a href="#" class="btn btn-primary tabby">Guests</a>
		<a href="#" class="btn btn-primary roomy">Types</a>
		<a href="#" class="btn btn-primary floory">Rooms</a>
	</div>
	<div class="row" id="gtable"></div>
</div>


<!-- ================ File ================ -->
<div class="container file">
	<div class="row col-md-offset-4 col-md-6">
		<form class="form-horizontal" name="fileForm" id="fileForm" method="get" action="readfile.php">
			<div class="form-group">
				<label class="control-label col-md-2" for="fileText">File</label>

				<div class="col-md-offset-2 col-md-4">
					<input class="form-control" id="fileText" name="fileText" type="text">
				</div>
			</div>
			<div class="form-group">
				<a class="btn btn-primary" href="#" id="fileButton">Read</a>
			</div>
		</form>
	</div>
</div>


<!-- ================ Command Line ================ -->
<div>
	<div>
		<pre id="output" class="text-capitalize"></pre>
	</div>
	<div>
		<input type="text" id="cmdText" placeholder="Type Command">
	</div>
	<div><a class="btn btn-primary" href="#" id="systemBtn">Files...</a></div>
	<div>
		<pre class="filesystem"></pre>
	</div>
</div>


<!-- ================ File ================ -->
<div class="container ">
	<div class="row col-md-offset-4 col-md-6">

	</div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/login.js"></script>
<script>
	$(document).ready(function () {
		$('.tabby').on('click', function () {
			$('#gtable').load('table.php', {"table": 'guests'});
		});

		$('.roomy').on('click', function () {
			$('#gtable').load('table.php', {"table": 'rooms'});
		});

		$('.floory').on('click', function () {
			$('#gtable').load('table.php', {"table": 'floors'});
		});

		$('#fileButton').on('click', function () {
			$('#output').load('readfile.php', {'file': $('#fileText').val()});

		});

		$('#systemBtn').on('click', function () {
			$('.filesystem').load('../fill.php', {'command': $('#cmdText').val()});
		});
	});
</script>
</body>
</html>