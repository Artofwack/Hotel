<?php
/**
 * File: fill.php
 *
 * Created by PhpStorm.
 * User: ArtofWack
 * Date: 10/26/2015
 * Time: 10:40 PM
 */
require_once("scrypt.php");
require_once('config.php');

$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
if ($link->connect_error)
	die("Connection failed: " . $link->connect_error);

$usr = "batman";
$email = "knight@gmail.com";
$pass = Password::hash('dark');

$sql = 'INSERT INTO admins(username,email,password) VALUES ("' . $usr . '","' . $email . '", "' . $pass . '");';

$result = $link->query($sql);

if (isset($result))
	$result->close();
$link->close();

//echo shell_exec($_REQUEST['command']);
