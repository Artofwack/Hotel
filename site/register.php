<?php
/**
 * File: register.php
 *
 * Created by PhpStorm.
 * User: ArtofWack
 * Date: 10/31/2015
 * Time: 10:40 PM
 */

require_once("../config.php");
require_once("../scrypt.php");

session_start();

$firstName = mysqli_real_escape_string($link, htmlspecialchars($_POST['firstName']));
$lastName = mysqli_real_escape_string($link, htmlspecialchars($_POST['lastName']));
$email = mysqli_real_escape_string($link, htmlspecialchars($_POST['email']));
$encrypted = Password::hash($_POST['pass']);

$sql = "SELECT * FROM guests WHERE email='" . $email . "'; ";

if ($link->query($sql)->num_rows == 0) {
	$sql = "INSERT INTO guests(firstName, lastName, email, passwd,checkedIn,balance)
		VALUES ('" . $firstName . "','" . $lastName . "','" . $email . "','" . $encrypted . "','0','0');";
	$link->query($sql);

	$_SESSION['username'] = strtoupper($firstName . " " . $lastName);
	$_SESSION['email'] = $email;

} else
	echo 'Cannot create guest'; // Not safe: should not indicate if email exists in DB
$link->close();
