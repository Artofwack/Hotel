<?php
/**
 * File: fill.php
 *
 * Created by PhpStorm.
 * User: ArtofWack
 * Date: 10/26/2015
 * Time: 10:40 PM
 */
/*require_once("scrypt.php");

$link = new mysqli('localhost', 'hotel', 'reserve', 'hotel');
$encrypt = Password::hash("decrepito2");
if ($link->connect_error)
	die("Connection failed: " . $link->connect_error);

$sql = 'SELECT * FROM guests';

$result = $link->query($sql);

if (isset($result))
	$result->close();
$link->close();*/

echo shell_exec('cd /home/art; ls -al');
