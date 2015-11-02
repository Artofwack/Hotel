<?php
/**
 * File: logIn.php
 *
 * Created by PhpStorm.
 * User: ArtofWack
 * Date: 10/31/2015
 * Time: 9:58 PM
 */
require_once("../config.php");
require_once("../scrypt.php");

session_start();

$email = $_POST['email'];
$pass = $_POST['pass'];

if (isset($email) && $email != "") {
	$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
	if ($link->connect_error)
		die(" Error: " . $link->connect_error);

	$sql = 'SELECT passwd FROM guests WHERE email="' . $email . '";';
	$result = $link->query($sql);

	if ($result->num_rows == 1) {
		$result = $result->fetch_assoc();
		if (Password::check($pass, $result['passwd'])) {
			$sql = 'SELECT * FROM guests WHERE email="' . $email . '";';
			$result = $link->query($sql)->fetch_assoc();
			$_SESSION['username'] = strtoupper($result['firstName'] . " " . $result['lastName']);
			$_SESSION['email'] = $email;
			$_SESSION['guestID'] = $result['guestID'];
			header('Location: hotel.php');
		} else {
			session_unset();
		}

	}
	$result->close();
	$link->close();
}