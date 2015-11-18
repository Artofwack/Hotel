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

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$encrypted = Password::hash($_POST['pass']);

$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
if ($link->connect_error)
	die(" Error: " . $link->connect_error);

$sql = "SELECT * FROM guests WHERE email='" . $email . "'; ";

if ($link->query($sql)->num_rows == 0) {
	$sql = "INSERT INTO guests(firstName, lastName, email, passwd,checkedIn,balance)
		VALUES ('" . $firstName . "','" . $lastName . "','" . $email . "','" . $encrypted . "','0','0');";
	$link->query($sql);
} else
	echo 'Cannot create guest'; // Not safe: should not indicate if email exists in DB
$link->close();
