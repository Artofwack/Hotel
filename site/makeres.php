<?php
/**
 * File: makeres.php
 *
 * Created by PhpStorm.
 * User: ArtofWack
 * Date: 1/19/2016
 * Time: 12:15 PM
 */
require_once('../config.php');

session_start();

$checkIN = $_POST['checkIN'];
$checkOUT = $_POST['checkOUT'];
$roomType = $_POST['roomType'];
$email = $_SESSION['email'];

$sql = "SELECT guestID FROM guests WHERE email='" . $email . "'; ";
$result = $link->query($sql)->fetch_assoc();

$guestID = $result['guestID'];

// TODO: Notify if user is not logged in
if ($guestID != 0) {
	// Convert datepicker.js dates to MYSQL date format
	$checkIN = convertDates($checkIN);
	$checkOUT = convertDates($checkOUT);

	// Select random available room
	$sql = 'SELECT
				roomID
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
			)
			ORDER BY
				Rand();';

	$res = $link->query($sql);
	$result = $res->fetch_assoc();
	$room = 0;

	if (mysqli_num_rows($res) != 0) {

		echo $room . "\n";
		$room = $result['roomID'];
		$res->free();


		$sql = "INSERT INTO reservations (guestID, room, checkIN, checkOUT)";
		$sql .= " VALUES ('" . $guestID . "', '" . $room . "', '" . $checkIN . "' , '" . $checkOUT . "');";
		$link->query($sql);

		// Write to user log
		$file = fopen("../files/guestLOG.log", "a");
		if ($file) {
			fwrite($file, $_SESSION['email'] . "\t Created Reservation @ " . date('m-d-Y - H:i:s') . "\n");
			fclose($file);
		}

		/*
		// TODO: Send confirmation email
		$msg = 'Hello from the other side!!!!';
		$msg = escapeshellarg($msg);
		$email = escapeshellarg($email);
		shell_exec('../execs/sendmail.sh "' . $msg . '" "' . $email . '" ');
		*/
	}
}
