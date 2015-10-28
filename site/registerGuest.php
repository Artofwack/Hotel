<?php
/**
 * File: registerGuest.php
 *
 * Created by PhpStorm.
 * User: ArtofWack
 * Date: 10/27/2015
 * Time: 8:21 PM
 */

require_once("../config.php");
require_once("../scrypt.php");

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$encrypted = Password::hash($_POST['pass']);

$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
if ($link->connect_error)
	die(" Error: " . $link->connect_error);

$sql = 'SELECT * FROM guests WHERE email="' . $email . '";';
$result = $link->query($sql);

if ($result->num_rows == 0) {
	$sql = "INSERT INTO guests(firstName, lastName, email, passwd,checkedIn,balance) VALUES ('" . $firstName . "','" . $lastName . "','" . $email . "','" . $encrypted . "','0','0');";
	$result = $link->query($sql);
	header('Location: reserve.html');
} else {
	header('Location: hotel.html');
}