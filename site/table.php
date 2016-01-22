<?php
	/**
	 * File: table.php
	 *
	 * Created by PhpStorm.
	 * User: ArtofWack
	 * Date: 11/1/2015
	 * Time: 5:39 PM
	 */

	require_once('../config.php');

	$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
	if ($link->connect_error)
		die(" Error: " . $link->connect_error);

	if ($_REQUEST['table'] == 'guests') { // Guests Table

		$sql = 'SELECT * FROM guests;';
		$result = $link->query($sql);

		echo "<table class='table table-responsive table-bordered' id='userTable'><tr><th>Guest ID</th><th>Guest Name</th><th>Email</th></tr>";

		foreach ($result as $row) {
			echo '<tr>';
			echo '<td>' . $row['guestID'] . '</td>';
			echo '<td class="text-capitalize">' . $row['firstName'] . " " . $row['lastName'] . '</td>';
			echo '<td>' . $row['email'] . '</td>';
			echo '</tr>';
		}
		echo '</table>';
	} elseif ($_REQUEST['table'] == 'rooms') { // Room Type Table
		$sql = 'SELECT * FROM room_type;';
		$result = $link->query($sql);

		echo "<table class='table table-responsive table-bordered' id='userTable'><tr><th>Room Type ID</th><th>Description</th><th>Available</th><th>Rate</th></tr>";

		foreach ($result as $row) {
			echo '<tr>';
			echo '<td>' . $row['typeID'] . '</td>';
			echo '<td>' . $row['name'] . '</td>';
			echo '<td>' . $row['available'] . '</td>';
			echo '<td>' . $row['rate'] . '</td>';
			echo '</tr>';
		}
		echo '</table>';
	} elseif ($_REQUEST['table'] == 'floors') { // Room Table
		$sql = 'SELECT guests.firstName, guests.lastName, reservations.reservationID, room_type.name, reservations.checkIN, reservations.checkOUT
	  FROM reservations JOIN guests
      ON reservations.guestID = guests.guestID
      JOIN room_type
      ON reservations.roomType = room_type.typeID;';
		$result = $link->query($sql);

		$fieldnames = $result->fetch_fields();

		echo '<table class="table table-responsive table-bordered">';
		echo '<tr>';

		foreach ($fieldnames as $fieldname) {
			echo '<th>' . $fieldname->name . '</th>';
		}

		echo '</tr>';

		foreach ($result as $res) {
			echo '<tr>';
			foreach ($res as $row) {
				echo '<td>' . $row . '</td>';
			}
			echo '</tr>';
		}

		echo '</table>';

	}
	if (isset($result))
		$result->close();
	$link->close();
