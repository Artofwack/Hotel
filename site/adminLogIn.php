<?php
/**
 * File: adminLogIn.php
 *
 * Created by PhpStorm.
 * User: ArtofWack
 * Date: 1/22/2016
 * Time: 5:29 PM
 */

require_once('../config.php');
require_once('../scrypt.php');

session_start();

$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['pass'];

$sql = 'SELECT password FROM admins WHERE email = "' . $email . '" AND username = "' . $username . '";';
$result = $link->query($sql);

if ($result->num_rows == 1) {
	$result = $result->fetch_assoc();
	if (Password::check($pass, $result['password'])) {

		$_SESSION['username'] = $username;
		$_SESSION['email'] = $email;

		$file = fopen("../admin/adminLOG.log", "a");
		$logdate = date('m-d-Y - H:i:s');
		if ($file) {
			fwrite($file, $_SESSION['username'] . " --- " . $_SESSION['email'] . "\t Logged In @ " . $logdate . "\n");
			fclose($file);
		}

		$sql = 'UPDATE admins SET lastLogin = NOW() WHERE email = "' . $email . '";';
		$link->query($sql);

	}
}
/*
if (isset($result))
	$result->free();
$link->close();
*/