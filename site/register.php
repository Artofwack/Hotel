<?php
/**
 * File: register.php
 *
 * Created by PhpStorm.
 * User: ArtofWack
 * Date: 10/31/2015
 * Time: 10:40 PM
 */

require_once('../connect_DB.php');
require_once("../scrypt.php");

session_start();

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$encrypted = Password::hash($_POST['pass']);

$sql = "SELECT * FROM guests WHERE email='" . $email . "'; ";

if ($link->query($sql)->num_rows == 0 && $email != '' && $firstName != '' && $lastName != '' && $_POST['pass'] != '') {
	$sql = "INSERT INTO guests(firstName, lastName, email, passwd,checkedIn,balance)
		VALUES ('" . $firstName . "','" . $lastName . "','" . $email . "','" . $encrypted . "','0','0');";
	$link->query($sql);
} else
	echo '<label class="text-danger">Cannot create guest</label>'; // Not safe: should not indicate if email exists in DB
$link->close();