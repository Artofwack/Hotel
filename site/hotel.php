<?php

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
						<li><a href="hotel.php" class="active">Home</a></li>
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
								<li><a href="#">Dining Reservations</a></li>
								<li class="divider"></li>
								<li class="dropdown-header">Existing Reservations</li>
								<li><a href="#">Check Reservation</a></li>
								<li><a href="#">Cancel Reservation</a></li>
							</ul>
						</li>
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


<!-- ================ Carousel ================ -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<img class="first-slide"
			     src="../images/hotel-generic.jpg"
			     alt="First slide">

			<div class="container">
				<div class="carousel-caption">
					<h1>Example headline.</h1>

					<p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous"
						Glyphicon buttons on the left and right might not load/display properly due to web browser
						security rules.</p>

					<p><a class="btn btn-lg btn-primary" href="#" data-toggle="modal" data-target="#myModal"
					      role="button">Sign up today</a></p>
				</div>
			</div>
		</div>
		<div class="item">
			<img class="second-slide"
			     src="../images/swimming-pool-hotel-barcelo-jandia-mar37-2633.jpg"
			     alt="Second slide">

			<div class="container">
				<div class="carousel-caption">
					<h1>Another example headline.</h1>

					<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida
						at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

					<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
				</div>
			</div>
		</div>
		<div class="item">
			<img class="third-slide"
			     src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
			     alt="Third slide">

			<div class="container">
				<div class="carousel-caption">
					<h1>One more for good measure.</h1>

					<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida
						at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

					<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
				</div>
			</div>
		</div>
	</div>
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>


<!-- ================ Marketing messaging and featurettes ================ -->
<div class="container marketing">

	<!-- Three columns of text below the carousel -->
	<div class="row">
		<div class="col-lg-4">
			<img class="img-circle"
			     src="../images/Hotel.jpg"
			     alt="Generic placeholder image" width="140" height="140">

			<h2>Heading</h2>

			<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies
				vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo
				cursus magna.</p>

			<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
		</div>
		<!-- /.col-lg-4 -->
		<div class="col-lg-4">
			<img class="img-circle"
			     src="../images/hotel-generic.jpg"
			     alt="Generic placeholder image" width="140" height="140">

			<h2>Heading</h2>

			<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras
				mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris
				condimentum nibh.</p>

			<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
		</div>
		<!-- /.col-lg-4 -->
		<div class="col-lg-4">
			<img class="img-circle"
			     src="../images/hotel-generic.jpg"
			     alt="Generic placeholder image" width="140" height="140">

			<h2>Heading</h2>

			<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula
				porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut
				fermentum massa justo sit amet risus.</p>

			<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
		</div>
		<!-- /.col-lg-4 -->
	</div>
	<!-- /.row -->


	<!-- START THE FEATURETTES -->

	<hr class="featurette-divider">

	<div class="row featurette" id="about">
		<div class="col-md-7">
			<h2 class="featurette-heading">First featurette heading. <span
					class="text-muted">It'll blow your mind.</span></h2>

			<p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod
				semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus
				commodo.</p>
		</div>
		<div class="col-md-5">
			<img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto"
			     src="../images/costa-sur-resort-and-spa-1.jpg"
			     alt="Generic placeholder image">
		</div>
	</div>

	<hr class="featurette-divider">

	<div class="row featurette">
		<div class="col-md-7 col-md-push-5">
			<h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span>
			</h2>

			<p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod
				semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus
				commodo.</p>
		</div>
		<div class="col-md-5 col-md-pull-7">
			<img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto"
			     src="../images/costa-sur-resort-and-spa-1.jpg"
			     alt="Generic placeholder image">
		</div>
	</div>

	<hr class="featurette-divider">

	<div class="row featurette" id="contact">
		<div class="col-md-7">
			<h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>

			<p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod
				semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus
				commodo.</p>
		</div>
		<div class="col-md-5">
			<img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto"
			     src="../images/swimming-pool-hotel-barcelo-jandia-mar37-2633.jpg"
			     alt="Generic placeholder image">
		</div>
	</div>

	<hr class="featurette-divider">

	<!-- /END THE FEATURETTES -->

	<!-- FOOTER -->
	<footer>
		<p class="pull-right"><a class="toppy" href="#">Back to top</a></p>

		<p>&copy; 2014 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
	</footer>

</div>


<!-- ========== Back to top ========== -->
<a class="back-to-top btn btn-default btn-sm" href="#"><span class="glyphicon glyphicon-chevron-up"></span></a>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
	var amountScrolled = 300;

	$(window).scroll(function () {
		if ($(window).scrollTop() > amountScrolled) {
			$('a.back-to-top').fadeIn('slow');
		} else {
			$('a.back-to-top').fadeOut('slow');
		}
	});

	$('a.back-to-top, a.toppy').on('click', function () {
		$('body, html').animate({
			scrollTop: 0
		}, 'fast');
		return false;
	});

</script>

</body>
</html>
