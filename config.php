<?php

/**
 * File: config.php
 * Created by PhpStorm.
 * User: ArtofWack
 * Date: 10/14/2015
 * Time: 10:28 AM
 */

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'decrepito2');
define('DB_DATABASE', 'hotel');

$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
if ($link->connect_error)
	die(" Error: " . $link->connect_errno . "  " . $link->connect_error);

// Convert datepicker.js date string to formatted date object for MYSQL
function convertDates($dateIN)
{
	$date = DATETIME::createFromFormat("D M d Y H:i:s+", $dateIN);
	return $date->format("Y-m-d");
}

// check available rooms of certain type for dates selected
function checkAvailability($checkIN, $checkOUT, $roomType)
{
	global $link;

	$sql = 'SELECT
				*
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

	return $res;
}