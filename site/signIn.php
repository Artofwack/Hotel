<?php
/**
 * File: signIn.php
 *
 * Created by PhpStorm.
 * User: ArtofWack
 * Date: 10/30/2015
 * Time: 12:29 AM
 */

require_once("../config.php");
require_once("../scrypt.php");

session_start();

$email = $_POST['email'];
$pass = $_POST['pass'];

if (isset($email) && $email != "") {
	$sql = 'SELECT passwd FROM guests WHERE email="' . $email . '";';
	$result = $link->query($sql);

	if ($result->num_rows == 1) {
		$result = $result->fetch_assoc();
		if (Password::check($pass, $result['passwd'])) {
			$sql = 'SELECT * FROM guests WHERE email="' . $email . '";';
			$result = $link->query($sql)->fetch_assoc();
			$_SESSION['username'] = $result['firstName'] . " " . $result['lastName'];
			$_SESSION['email'] = $email;
			$_SESSION['guestID'] = $result['guestID'];
			header('Location: hotel.php');
		} else {
			session_unset();
		}

	}
	$result->close();
	$link->close();
}
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
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Log in</h4>
			</div>
			<div class="modal-body">
				<!-- ================ Form ================ -->

				<form class="form-horizontal" method="post" action="logIn.php" id="loginForm">
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
							<button type="submit" class="btn btn-primary">Sign in</button>
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

				<form class="form-horizontal" method="post" action="register.php">
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
							<input type="email" class="form-control" name="regEmail" placeholder="Email" required>
						</div>
					</div>
					<div class="form-group">
						<label for="regPass" class="col-sm-4 control-label">Password</label>

						<div class="col-sm-6">
							<input type="password" class="form-control" name="regPass" placeholder="Password"
							       required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-5 col-sm-3">
							<button type="submit" class="btn btn-primary">Register</button>
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
								<li role="separator" class="divider"></li>
								<li class="dropdown-header">Existing Reservations</li>
								<li><a href="#">Check Reservation</a></li>
								<li><a href="#">Cancel Reservation</a></li>
							</ul>
						</li>
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

<!-- ================ Form ================ -->
<div class="container under-nav">
	<form class="form-horizontal" method="post" action="<?php $_PHP_SELF ?>">
		<div class="form-group">
			<label for="email" class="col-sm-2 control-label">Email</label>

			<div class="col-sm-6">
				<input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
			</div>
		</div>
		<div class="form-group">
			<label for="pass" class="col-sm-2 control-label">Password</label>

			<div class="col-sm-6">
				<input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-6">
				<button type="submit" class="btn btn-default">Sign in</button>
			</div>
		</div>
	</form>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>

