<?php
/**
 * File: admin.php
 *
 * Created by PhpStorm.
 * User: ArtofWack
 * Date: 1/17/2016
 * Time: 4:40 PM
 */

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

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/css/uikit.gradient.min.css"/>
	<link rel="stylesheet" href="css/hotel.css"/>
</head>

<body>
<!-- ================ Nav Bar ================ -->
<div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
	<nav class="uk-navbar uk-margin-large-bottom">
		<a class="uk-navbar-brand uk-hidden-small" href="site/logout.php">Hotel California</a>
		<ul class="uk-navbar-nav uk-hidden-small">
			<li>
				<a href="site/logout.php">Frontpage</a>
			</li>
		</ul>
		<ul class="uk-navbar-nav uk-hidden-small" data-uk-switcher="{connect:'#panel', animation: 'slide-bottom'}">
			<li>
				<a href="#" id="guests">Guests</a>
			</li>
			<li>
				<a href="#" id="reserve">Reservations</a>
			</li>
			<li>
				<a href="#" id="rooms">Available Rooms</a>
			</li>
			<li>
				<div class="uk-hidden" id="guestConsole"></div>
			</li>
		</ul>
		<ul class="uk-navbar-nav uk-navbar-flip uk-hidden-small">
			<li>
				<a href="site/logout.php" class='uk-icon-hover'>Logout <i class="uk-icon-sign-out"></i></a>
			</li>
		</ul>
		<a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
		<div class="uk-navbar-brand uk-navbar-center uk-visible-small">Hotel California</div>
	</nav>
</div>


<!-- ================ Panel ================ -->
<div class="uk-container uk-container-center">
	<ul id='panel' class="uk-switcher">
		<!-- Guests Table -->
		<li>
			<div id="guest-table" class="uk-container uk-container-center uk-block uk-table"></div>
		</li>
		<!-- Reservations Table -->
		<li>
			<div id="res-table" class="uk-container uk-container-center uk-block uk-table"></div>
		</li>
		<!-- Rooms Table -->
		<li>
			<div id="rooms-table" class="uk-container uk-container-center uk-block"></div>
		</li>
		<!-- Guests Console -->
		<li>
			<div id="guest-Console" class="uk-container uk-container-center uk-block">
				<div class="uk-grid">
					<div class="uk-width-1-2"><div class="uk-panel uk-panel-box" id="guestName"></div></div>
					<div class="uk-width-1-2"><div class="uk-grid">
							<div class="uk-width-1-2"><div class="uk-panel uk-panel-box" id="guestCheckedIn"></div></div>
							<div class="uk-width-1-2"><div class="uk-panel uk-panel-box" id="guestBalance"></div></div>
						</div></div>
				</div>
				<div class="uk-grid">
					<div class="uk-width-1-2"><div class="uk-panel uk-panel-box uk-flex uk-flex-column"></div></div>
					<div class="uk-width-1-2"><div class="uk-grid">
							<div class="uk-width-1-2"><div class="uk-grid">
									<div class="uk-width-1-2"><button type="button" class="uk-button" id="checkIN">Check In</button></div>
									<div class="uk-width-1-2"><button type="button" class="uk-button" id="checkOUT">Check OUT</button></div>
								</div> </div>
							<div class="uk-width-1-2"><button type="button" class="uk-button" id="pay">Payment</button></div>
						</div></div>
				</div>
			</div>
		</li>
	</ul>
</div>


<!-- ================ Scripts ================ -->
<script src="js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/uikit.min.js"></script>
<script>
	$(document).ready(function () {
		var guest;

		function fillConsole(data){
			$('#guestName').html(data['name']);
			$('#guestCheckedIn').html(data['check']);
			$('#guestBalance').html(data['balance']);
		}

		$('#guest-table').load('admin/adminTable.php', {'request':'guests'});

		$.post('site/table.php', {'table': 'floors'}, function (data) {
			$('#res-table').html(data);
		});

		$('body').on('click', '.guestSel', function(){
			guest = $(this).attr('guest');

			$.ajax({
				type: 'post',
				dataType: 'json',
				url: 'admin/adminTable.php',
				data: {
					request: 'console',
					guestID: guest
				}, success: function (data) {
					fillConsole(data);
				}
			});
		});

		$('#checkIN').on('click', function() {
			$.post('admin/adminTable.php', {
				'request':'checkIN',
				'guestID': guest
			}, function (data) {
				$('#guest-table').load('admin/adminTable.php', {'request':'guests'});
				fillConsole(data);
			}, 'json');
		});

		$('#checkOUT').on('click', function() {
			$.post('admin/adminTable.php', {
				'request':'checkOUT',
				'guestID': guest
			}, function (data) {
				$('#guest-table').load('admin/adminTable.php', {'request':'guests'});
				fillConsole(data);
			}, 'json');
		});

		$('#pay').on('click', function() {
			$.post('admin/adminTable.php', {
				'request':'payment',
				'guestID': guest
			}, function (data) {
				$('#guest-table').load('admin/adminTable.php', {'request':'guests'});
				fillConsole(data);
			}, 'json');
		});
	});
</script>
</body>
</html>