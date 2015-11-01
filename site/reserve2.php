<?php
/**
 * File: reserve2.php
 *
 * Created by PhpStorm.
 * User: ArtofWack
 * Date: 10/27/2015
 * Time: 7:58 PM
 */
require_once("../config.php");
require_once("../scrypt.php");

session_start();

// Guests Info
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$encrypted = Password::hash($_POST['pass']);

// Room Reservation Info
$checkIN = $_POST['startDate'];
$checkOUT = $_POST['endDate'];
$roomType = $_POST['roomType'];

$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
if ($link->connect_error)
	die(" Error: " . $link->connect_error);

$sql = 'SELECT * FROM guests WHERE email="' . $email . '";';
$result = $link->query($sql);

if ($result->num_rows == 1) {
	$row = $result->fetch_assoc();
	if (Password::check($_POST['pass'], $row['passwd'])) {
		$sql = "INSERT INTO reservations(guestID, room, checkIN, checkOUT, balance )  VALUES ('" . $row['guestID'] . "','0','" . $checkIN . "','" . $checkOUT . "','0');";
	}

}