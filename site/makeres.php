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
$email = $_SESSION['email'];

$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
if ($link->connect_error)
	die(" Error: " . $link->connect_error);

$sql = "SELECT guestID FROM guests WHERE email='" . $email . "'; ";
$result = $link->query($sql)->fetch_assoc();

$guestID = $result['guestID'];

/* TODO: Check if user is logged in */

$date = DATETIME::createFromFormat("D M d Y H:i:s+", $checkIN);
$checkIN = $date->format("Y-m-d");
$date = DATETIME::createFromFormat("D M d Y H:i:s+", $checkOUT);
$checkOUT = $date->format("Y-m-d");

/* TODO: Check availability */

$sql = "INSERT INTO reservations (guestID, roomType, checkIN, checkOUT)";
$sql .= " VALUES ('" . $guestID . "', '" . $_POST['roomType'] . "', '" . $checkIN . "' , '" . $checkOUT . "');";
$link->query($sql);

$file = fopen("../files/guestLOG.log", "a");
if ($file) {
	fwrite($file, $_SESSION['email'] . "\t Created Reservation @ " . date('m-d-Y - H:i:s') . "\n");
	fclose($file);
}

/* TODO: Send confirmation email */

shell_exec('../execs/sendmail.sh');