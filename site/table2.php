<?php
/**
 * Created by PhpStorm.
 * User: lab
 * Date: 1/20/2016
 * Time: 3:23 AM
 */

require_once('../config.php');

session_start();

$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
if ($link->connect_error)
	die(" Error: " . $link->connect_error);

$sql = 'SELECT reservations.reservationID, reservations.room, room_type.name, reservations.checkIN, reservations.checkOUT
      FROM reservations JOIN room_type;';
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