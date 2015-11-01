<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>index</title>

	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<!-- Bootstrap core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">

	<!-- Bootstrap Cosmo Theme CSS
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/cosmo/bootstrap.min.css" rel="stylesheet"
	        integrity="sha256-IF1P9CSIVOaY4nBb5jATvBGnxMn/4dB9JNTLqdxKN9w= sha512-UsfHxnPESse3RgYeaoQ7X2yXYSY5f6sB6UT48+F2GhNLqjbPhtwV2WCUQ3eQxeghkbl9PioaTOHNA+T0wNki2w=="
	        crossorigin="anonymous">
	-->
	<link href="http://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/css/datepicker3.css"
	      rel="stylesheet">

	<!-- Custom styles for this project -->
	<link href="../css/hotel.css" rel="stylesheet">

</head>
<body>

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
								<li role="separator" class="divider"></li>
								<li class="dropdown-header">Existing Reservations</li>
								<li><a href="#">Check Reservation</a></li>
								<li><a href="#">Cancel Reservation</a></li>
							</ul>
						</li>
						<li>
							<a href="signIn.php">Welcome<?php echo isset($_SESSION['username']) ? ", " . $_SESSION['username'] : "! Please Register or Sign In" ?></a>
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


<!-- ================ Form ================ -->
<div class="container under-nav">
	<!-- ================ Date Range ================ -->
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="input-daterange input-group" id="datepicker">
				<input type="text" class="input-sm form-control startDate" name="start"/>
				<span class="input-group-addon">to</span>
				<input type="text" class="input-sm form-control endDate" name="end"/>
			</div>
		</div>
	</div>
	<div class="row">
		<form class="form-horizontal">
			<div class="form-group">
				<label class="control-label col-md-2 ">Start Date</label>

				<div class="col-md-2">
					<input type="text" class="col-md-2 form-control output" id="checkInDate" placeholder="Check In Date"
					       value="">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 ">End Date</label>

				<div class="col-md-2">
					<input type="text" class="col-md-2 form-control out" id="checkOutDate" placeholder="Check Out Date"
					       value="">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">Nights</label>

				<div class="col-md-2">
					<input class="form-control col-md-2 nights" id="nights" placeholder="Nights" value="">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-offset-2 col-md-2">
					<a class="btn btn-md btn-default nightsButton" href="#" role="button">Calculate Nights</a>
				</div>
			</div>
		</form>
	</div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="http://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('.input-daterange').datepicker({
			format: "dd-M-yyyy",
			startDate: '0d',
			endDate: '+3m',
			todayBtn: "linked",
			todayHighlight: 'True',
			autoclose: 'True'
		});

		$('.startDate').datepicker()
			.on('changeDate', function (selected) {
				$('.output').val($(this).datepicker('getDate').toLocaleDateString());
				$('.endDate').datepicker('setStartDate', selected.date);
			});

		$('.endDate').datepicker()
			.on('changeDate', function (selected) {
				$('.out').val($(this).datepicker('getDate').toLocaleDateString());
			});

		$('.nightsButton').on('click', function () {
			var d1 = $('.startDate').datepicker('getDate');
			var d2 = $('.endDate').datepicker('getDate');
			if (d1 && d2) {
				var diff = Math.floor((d2.getTime() - d1.getTime()) / 86400000);
				$('.nights').val(diff.toString());
			}
		});
	});

</script>

</body>
</html>

