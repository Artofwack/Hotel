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

$sql = 'SELECT passwd FROM guests WHERE email="' . $email . '";';
$result = $link->query($sql);

if ($result->num_rows == 1) {
	$res = $result->fetch_assoc();
	echo $res[0];

	if (Password::check($pass, $res['passwd'])) {
		$sql = 'SELECT firstName, lastName FROM guests WHERE email="' . $email . '";';
		$result = $link->query($sql);
		$res = $result->fetch_assoc();
		$_SESSION['username'] = strtoupper($res['firstName'] . " " . $res['lastName']);
		$_SESSION['email'] = $email;
		echo 'logged';
		$file = fopen("../files/guestLOG.log", "a");
		if ($file) {
			fwrite($file, $_SESSION['email'] . "\t Logged In           @ " . date('m-d-Y - H:i:s') . "\n");
			fclose($file);
		}

	} else {
		echo 'Login Credentials Incorrect';
	}
} else {
	echo 'Login Credentials Incorrect';
}

if (isset($result))
	$result->free();
$link->close();
