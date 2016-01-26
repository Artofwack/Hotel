<?php
/**
 * File: gallery.php
 *
 * Created by PhpStorm.
 * User: ArtofWack
 * Date: 1/25/2016
 * Time: 10:56 PM
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
	<link rel="stylesheet" href="../UIKit/css/components/sticky.gradient.min.css">

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
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#adminLogon">Hotel California</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="hotel.php">Home</a></li>
						<li><a href="#about">About</a></li>
						<li><a href="gallery.php">Gallery</a></li>
						<li><a href="#contact">Contact</a></li>
						<li><a href="#" data-toggle="modal" data-target="#registerModal">Register</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
							   aria-haspopup="true" aria-expanded="false">Reservations<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li class="dropdown-header">New Reservations</li>
								<li><a href="index.php">New Reservation</a></li>
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


<!-- ================ Gallery ================ -->
<div class="container under-nav">
	<div class="uk-flex uk-flex-center">
		<!-- Filter Controls -->
		<ul id="my-id" class="uk-subnav uk-subnav-pill">
			<li data-uk-filter="" class="uk-active"><a href="">ALL</a></li>
			<li data-uk-filter="filter-a"><a href="">FILTER A</a></li>
			<li data-uk-filter="filter-b"><a href="">FILTER B</a></li>
			<li data-uk-filter="filter-c"><a href="">FILTER C</a></li>
		</ul>
	</div>
	<div class="uk-grid-width-small-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-4 tm-grid-heights"
	     data-uk-grid="{gutter: 20, controls: '#my-id'}">
		<div data-uk-filter="filter-a">
			<div class="uk-block-secondary"></div>
		</div>
		<div data-uk-filter="filter-c">
			<div class="uk-block-primary">2</div>
		</div>
		<div data-uk-filter="filter-b">
			<div class="uk-panel-box">3</div>
		</div>
		<div data-uk-filter="filter-c">
			<div class="uk-block-primary">2</div>
		</div>
		<div data-uk-filter="filter-b">
			<div class="uk-panel-box">3</div>
		</div>
		<div data-uk-filter="filter-c">
			<div class="uk-block-primary">2</div>
		</div>
		<div data-uk-filter="filter-a">
			<div class="uk-block-secondary">7</div>
		</div>
		<div data-uk-filter="filter-b">
			<div class="uk-panel-box">8</div>
		</div>
		<div data-uk-filter="filter-a">
			<div class="uk-block-secondary">4</div>
		</div>
		<div data-uk-filter="filter-c">
			<div class="uk-block-primary">5</div>
		</div>
		<div data-uk-filter="filter-a">
			<div class="uk-block-secondary">7</div>
		</div>
		<div data-uk-filter="filter-a">
			<div class="uk-block-secondary"></div>
		</div>
		<div data-uk-filter="filter-c">
			<div class="uk-block-primary">5</div>
		</div>
		<div data-uk-filter="filter-a">
			<div class="uk-block-secondary">4</div>
		</div>
		<div data-uk-filter="filter-c">
			<div class="uk-block-primary">5</div>
		</div>
		<div data-uk-filter="filter-b">
			<div class="uk-panel-box">6</div>
		</div>
		<div data-uk-filter="filter-b">
			<div class="uk-panel-box">3</div>
		</div>
		<div data-uk-filter="filter-a">
			<div class="uk-block-secondary">4</div>
		</div>
		<div data-uk-filter="filter-c">
			<div class="uk-block-primary">5</div>
		</div>
		<div data-uk-filter="filter-b">
			<div class="uk-panel-box">6</div>
		</div>
		<div data-uk-filter="filter-a">
			<div class="uk-block-secondary">7</div>
		</div>
		<div data-uk-filter="filter-b">
			<div class="uk-panel-box">8</div>
		</div>
		<div data-uk-filter="filter-b">
			<div class="uk-panel-box">6</div>
		</div>
		<div data-uk-filter="filter-a">
			<div class="uk-block-secondary">7</div>
		</div>
		<div data-uk-filter="filter-b">
			<div class="uk-panel-box">8</div>
		</div>
		<div data-uk-filter="filter-a">
			<div class="uk-block-secondary"></div>
		</div>
		<div data-uk-filter="filter-a">
			<div class="uk-block-secondary"></div>
		</div>
		<div data-uk-filter="filter-c">
			<div class="uk-block-primary">2</div>
		</div>
		<div data-uk-filter="filter-b">
			<div class="uk-panel-box">3</div>
		</div>
		<div data-uk-filter="filter-c">
			<div class="uk-block-primary">2</div>
		</div>
		<div data-uk-filter="filter-b">
			<div class="uk-panel-box">3</div>
		</div>
		<div data-uk-filter="filter-c">
			<div class="uk-block-primary">2</div>
		</div>
		<div data-uk-filter="filter-a">
			<div class="uk-block-secondary">7</div>
		</div>
		<div data-uk-filter="filter-b">
			<div class="uk-panel-box">8</div>
		</div>
		<div data-uk-filter="filter-a">
			<div class="uk-block-secondary">4</div>
		</div>
		<div data-uk-filter="filter-c">
			<div class="uk-block-primary">5</div>
		</div>
		<div data-uk-filter="filter-a">
			<div class="uk-block-secondary">7</div>
		</div>
		<div data-uk-filter="filter-a">
			<div class="uk-block-secondary"></div>
		</div>
		<div data-uk-filter="filter-c">
			<div class="uk-block-primary">5</div>
		</div>
		<div data-uk-filter="filter-a">
			<div class="uk-block-secondary">4</div>
		</div>
		<div data-uk-filter="filter-c">
			<div class="uk-block-primary">5</div>
		</div>
		<div data-uk-filter="filter-b">
			<div class="uk-panel-box">6</div>
		</div>
		<div data-uk-filter="filter-b">
			<div class="uk-panel-box">3</div>
		</div>
		<div data-uk-filter="filter-a">
			<div class="uk-block-secondary">4</div>
		</div>
		<div data-uk-filter="filter-c">
			<div class="uk-block-primary">5</div>
		</div>
		<div data-uk-filter="filter-b">
			<div class="uk-panel-box">6</div>
		</div>
		<div data-uk-filter="filter-a">
			<div class="uk-block-secondary">7</div>
		</div>
		<div data-uk-filter="filter-b">
			<div class="uk-panel-box">8</div>
		</div>
		<div data-uk-filter="filter-b">
			<div class="uk-panel-box">6</div>
		</div>
		<div data-uk-filter="filter-a">
			<div class="uk-block-secondary">7</div>
		</div>
		<div data-uk-filter="filter-b">
			<div class="uk-panel-box">8</div>
		</div>
		<div data-uk-filter="filter-a">
			<div class="uk-block-secondary"></div>
		</div>
	</div>
</div>


<!-- JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/uikit.min.js"></script>
<script src="../UIKit/js/components/grid.min.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/login.js"></script>
</body>
</html>
