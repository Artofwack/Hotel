<?php
/**
 * File: logIn.php
 *
 * Created by PhpStorm.
 * User: ArtofWack
 * Date: 10/31/2015
 * Time: 9:58 PM
 */
require_once('../connect_DB.php');
require_once("../scrypt.php");

session_start();

$email = $_POST['email'];
$pass = $_POST['pass'];

$sql = 'SELECT passwd FROM guests WHERE email="' . $email . '";';
$result = $link->query($sql);

if ($result->num_rows == 1) {
	$res = $result->fetch_assoc();
	$result->close();

	if (Password::check($pass, $res['passwd'])) {
		$sql = 'SELECT firstName, lastName FROM guests WHERE email="' . $email . '";';
		$res = $link->query($sql);
		$result = $res->fetch_assoc();
		$res->close();
		$_SESSION['username'] = strtoupper($result['firstName'] . " " . $result['lastName']);
		$_SESSION['email'] = $email;

		echo '<label class="text-success">Logged In</label>';
	} else {
		echo '<label class="text-danger">Login Credentials Incorrect</label>';
	}
} else {
	echo '<label class="text-danger">Login Credentials Incorrect</label>';
}

if (isset($result))
	$result->close();
$link->close();
