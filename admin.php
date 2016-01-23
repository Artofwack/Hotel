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
		<a class="uk-navbar-brand uk-hidden-small" href="site/hotel.php">Hotel California</a>
		<ul class="uk-navbar-nav uk-hidden-small">
			<li>
				<a href="site/hotel.php">Frontpage</a>
			</li>
		</ul>
		<ul class="uk-navbar-nav uk-hidden-small" data-uk-switcher="{connect:'#panel', animation: 'fade'}">
			<li>
				<a href="#">AAAAAAAAAAA</a>
			</li>
			<li>
				<a href="#">BBBBBBBBBBBB</a>
			</li>
			<li>
				<a href="#">Contact</a>
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
		<li>
			<div class="uk-form-row butts">
				<a href="#" class=" uk-button uk-button-primary tabby" pot="site/table.php" tabb="guests">Guests</a>
				<a href="#" class="uk-button uk-button-primary roomy" pot="site/table.php" tabb="rooms">Types</a>
				<a href="#" class="uk-button uk-button-primary floory" pot="site/table.php" tabb="floors">Res</a>
				<a href="#" class="uk-button uk-button-primary genButton" pot="site/gentable.php">Table</a>
			</div>
			<div>
				<label for="genTable">Table:</label>
				<input type="text" id="genTable" name="genTable">
			</div>
			<div id="gtable" class="uk-container uk-container-center uk-block uk-table"></div>
		</li>
		<li>
			asdfasdfasdfasdfasdf
		</li>
		<li>
			ggggggggggggggggg
		</li>
	</ul>
</div>


<!-- ================ Scripts ================ -->
<script src="js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/uikit.min.js"></script>
<script>
	$(document).ready(function () {
		$('.genButton').on('click', function () {
			$.post('site/gentable.php', {'table': $('#genTable').val()}, function (data) {
				$('#gtable').html(data);
				rowSelector();
			});
		});

		$('.butts > .uk-button:not(".genButton")').on('click', function () {
			var sel = $(this);
			$.post(sel.attr('pot'), {table: sel.attr('tabb')}, function (data) {
				$('#gtable').html(data);
				rowSelector();
			});
		});

		function rowSelector() {
			$('td').on('click', function () {
				$(this).closest('tr').toggleClass('red-row');
			});
		}
	});
</script>
</body>
</html>