<?php
/**
 * Created by PhpStorm.
 * User: lab
 * Date: 1/20/2016
 * Time: 3:23 AM
 */

require_once('../config.php');

session_start();

$sql = 'SELECT reservations.reservationID, room_type.room_type, reservations.checkIN, reservations.checkOUT
	  FROM reservations JOIN guests
      ON reservations.guestID = guests.guestID
      JOIN room_type
      ON reservations.roomType = room_type.typeID
      WHERE guests.email = "' . $_SESSION['email'] . '";';
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