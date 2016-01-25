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

$sql = 'SELECT COUNT(roomID)
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
					("' . $checkIN . '" BETWEEN reservations.checkIN AND reservations.checkOUT)
					OR ("' . $checkOUT . '" BETWEEN reservations.checkIN AND reservations.checkOUT)
					OR ("' . $checkIN . '" < reservations.checkIN AND "' . $checkOUT . '" > reservations.checkOUT)
			);';
