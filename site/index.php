<?php
/**
 * File: index.php
 *
 * Created by PhpStorm.
 * User: ArtofWack
 * Date: 10/27/2015
 * Time: 7:58 PM
 */

session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Hotel California</title>

	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<!-- Bootstrap core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">

	<!-- UIKit Gradient CSS-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/css/uikit.gradient.min.css"/>

	<link href="https://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/css/datepicker3.css"
	      rel="stylesheet">

	<!-- Custom styles for this project -->
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
				<form class="form-horizontal" id="loginForm" method="post">
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
				<label class="text-danger" id="notice"></label>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>


<!-- ========== Register modal ========== -->
<span class="modal fade" id="registerModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Register</h4>
			</div>
			<div class="modal-body">
				<!-- ================ Form ================ -->
				<form class="form-horizontal regForm" method="post">
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
				<label class="text-danger" id="notice2"></label>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</span>


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
						<li class="active"><a href="hotel.php">Home</a></li>
						<li><a href="#about">About</a></li>
						<li><a href="#contact">Contact</a></li>
						<li><a href="#" data-toggle="modal" data-target="#registerModal">Register</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
							   aria-haspopup="true" aria-expanded="false">Reservations<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li class="dropdown-header">New Reservations</li>
								<li><a href="reserve.php">New Reservation</a></li>
								<li><a href="index.php">Check Availability</a></li>
								<li class="divider"></li>
								<li class="dropdown-header">Existing Reservations</li>
								<li><a href="checkres.php">Check Reservation</a></li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
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
<div class="under-nav container">
	<ul class="uk-tab" data-uk-tab="{connect:'#my-id', animation: 'slide-horizontal'}">
		<li><a href="">DATES</a></li>
		<li><a href="">ROOMS</a></li>
		<li><a href="">RESERVE</a></li>
		<li><a href="">GUEST</a></li>
		<li><a href="">CONFIRM</a></li>
	</ul>

	<ul id="my-id" class="uk-switcher uk-margin">
		<!-- CHOOSE DATES -->
		<li>
			<div class="uk-block uk-block-muted uk-block-large">
				<div class="uk-grid">
					<div class="uk-width-1-4">
						Welcome! Come stay with us!
					</div>
					<div class="uk-width-1-4">
						Select the dates for your stay
					</div>
					<div class="uk-width-1-4">
						<div class="input-daterange input-group" id="datepicker">
							<input type="text" class="input-sm form-control startDate" name="start"/>
							<span class="input-group-addon">to</span>
							<input type="text" class="input-sm form-control endDate" name="end"/>
						</div>
					</div>
					<div class="uk-width-1-4">
						<a href="" class="uk-icon-button uk-icon-arrow-circle-right" data-uk-switcher-item="next"></a>
					</div>
				</div>
			</div>
		</li>

		<!-- TODO: Show available rooms for each room type-->
		<!-- CHOOSE ROOM TYPE -->
		<li>
			<div class="uk-block uk-block-muted uk-block-large">
				<div class="uk-grid">
					<div class="uk-width-1-3">
						Select a Room
					</div>
					<div class="uk-width-1-3">
						<div class="radio">
							<label>
								<input type="radio" name='roomType' id="standSingle" value="1" checked>
								Standard Single
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name='roomType' id="standDouble" value="2">
								Standard Double
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name='roomType' id="JrSuite" value="3">
								Jr Suite
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name='roomType' id="execSuite" value="4">
								Executive Suite
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name='roomType' id="pentSuite" value="5">
								Penthouse Suite
							</label>
						</div>
					</div>
					<div class="uk-width-1-3">
						<a href="" data-uk-switcher-item="next">NEXT</a>
					</div>
				</div>
			</div>
		</li>

		<!-- TODO: Show reservation dates and room info -->
		<!-- RESERVATION INFO -->
		<li>
			<div class="uk-block uk-block-muted uk-block-large">
				<div class="uk-grid">
					<div class="uk-width-1-3">
						<div id="res-dates"></div>
						<div id="res-dates-2"></div>
					</div>
					<div class="uk-width-1-3">
						<div id="res-room"></div>
					</div>
					<div class="uk-width-1-3">
						<a href="" data-uk-switcher-item="next">NEXT</a>
					</div>
				</div>
			</div>
		</li>

		<!-- TODO: Show logged in guest info or Register/Sign-in modal -->
		<!-- RESERVE -->
		<li>
			<div class="uk-block uk-block-muted uk-block-large">

				<a class="btn btn-md btn-default reserveButton" href="" role="button" data-uk-switcher-item="next">Reserve</a>
			</div>
		</li>

		<!-- TODO: Show reservation confirmation info -->
		<!-- CONFIRMATION -->
		<li>
			<div class="uk-block uk-block-muted uk-block-large">
				Confirmation
				<a href="#">DONE</a>
			</div>
		</li>

	</ul>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/uikit.min.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/login.js"></script>
<script
	src="https://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script>
	$(document).ready(function () {
		// Initialize date range picker
		$('.input-daterange').datepicker({
			format: "dd-M-yyyy",
			startDate: '0d',
			endDate: '+3m',
			todayBtn: "linked",
			autoclose: 'True'
		});

		$('.startDate').datepicker().on('changeDate', function (selected) {
			$('#res-dates').html($(this).datepicker('getDate'));
		});

		$('.endDate').datepicker().on('changeDate', function (selected) {
			$('#res-dates-2').html($(this).datepicker('getDate'));
		});

		$('input[name=roomType]').on('change', function () {
			$('#res-room').html($('input[name=roomType]:checked').val());
		});

		// Calulate number of nights from date range selected
		$('.nightsButton').on('click', function () {
		 var d1 = $('.startDate').datepicker('getDate');
		 var d2 = $('.endDate').datepicker('getDate');
		 if (d1 && d2) {
		 var diff = Math.floor((d2.getTime() - d1.getTime()) / 86400000);
		 $('.nights').val(diff.toString());
		 }
		 });

		// Reserve
		$('.reserveButton').on('click', function () {
			var startDate = $('.startDate');
			var endDate = $('.endDate');

			var d1 = startDate.datepicker('getDate');
			var d2 = endDate.datepicker('getDate');

			$.post('makeres.php', {
				'checkIN': d1,
				'checkOUT': d2,
				'roomType': $('input[name=roomType]:checked').val()
			});
		});
	});
</script>

</body>
</html>
