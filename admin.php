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

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Bootstrap Cosmo Theme CSS -->
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/cosmo/bootstrap.min.css" rel="stylesheet"
	      integrity="sha256-IF1P9CSIVOaY4nBb5jATvBGnxMn/4dB9JNTLqdxKN9w= sha512-UsfHxnPESse3RgYeaoQ7X2yXYSY5f6sB6UT48+F2GhNLqjbPhtwV2WCUQ3eQxeghkbl9PioaTOHNA+T0wNki2w=="
	      crossorigin="anonymous">


	<!-- Custom styles for this template -->
	<link href="css/hotel.css" rel="stylesheet">
</head>

<body>
<!-- ================ Reserve ================ -->
<div class="container under-nav">
	<div class="row btn-group butts">
		<a href="#" class="btn btn-primary tabby" pot="site/table.php" tabb="guests">Guests</a>
		<a href="#" class="btn btn-primary roomy" pot="site/table.php" tabb="rooms">Types</a>
		<a href="#" class="btn btn-primary floory" pot="site/table.php" tabb="floors">Res</a>
		<a href="#" class="btn btn-primary genButton" pot="site/gentable.php">Table</a>
	</div>
	<div>
		<label for="genTable">Table:</label>
		<input type="text" id="genTable" name="genTable">
	</div>

</div>

<div id="gtable" class="container table-responsive"></div>
<div id="clicked"></div>


<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jasny-bootstrap.min.js"></script>
<script>
	$(document).ready(function () {
		$('.genButton').on('click', function () {
			$.post('site/gentable.php', {'table': $('#genTable').val()}, function (data) {
				$('#gtable').html(data);
				rowSelector();
			});
		});

		$('.butts > .btn:not(".genButton")').on('click', function () {
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