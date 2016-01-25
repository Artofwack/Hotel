<?php
/**
 * File: available.php
 *
 * Created by PhpStorm.
 * User: ArtofWack
 * Date: 1/24/2016
 * Time: 11:35 PM
 */
require_once('../config.php');

$checkIN = $_POST['checkIN'];
$checkOUT = $_POST['checkOUT'];
$roomType = $_POST['roomType'];

/* Convert datepicker.js date string to formatted date object for MYSQL */
$date = DATETIME::createFromFormat("D M d Y H:i:s+", $checkIN);
$checkIN = $date->format("Y-m-d");
$date = DATETIME::createFromFormat("D M d Y H:i:s+", $checkOUT);
$checkOUT = $date->format("Y-m-d");

$sql = 'SELECT roomID
			FROM
				rooms
			WHERE
				roomID
			NOT IN (
				SELECT
					roomID
				FROM
					rooms
				LEFT OUTER JOIN
					reservations ON reservations.room = rooms.roomID
				WHERE
					roomType != "' . $roomType . '"
					OR ("' . $checkIN . '" BETWEEN reservations.checkIN AND reservations.checkOUT)
					OR ("' . $checkOUT . '" BETWEEN reservations.checkIN AND reservations.checkOUT)
					OR ("' . $checkIN . '" < reservations.checkIN AND "' . $checkOUT . '" > reservations.checkOUT)
			);';

$res = $link->query($sql);

echo mysqli_num_rows($res);