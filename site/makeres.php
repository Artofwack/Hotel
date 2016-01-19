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

$date = DATETIME::createFromFormat("D M d Y H:i:s+", $checkIN);
$checkIN = $date->format("Y-m-d");
$date = DATETIME::createFromFormat("D M d Y H:i:s+", $checkOUT);
$checkOUT = $date->format("Y-m-d");

$sql = "INSERT INTO reservations(guestID, room, checkIN, checkOUT, balance)";
$sql .= " VALUES ('" . $guestID . "', '1', '" . $checkIN . "' , '" . $checkOUT . "' ,'0');";
$link->query($sql);
