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

$link = new mysqli('localhost', 'hotel', 'reserve', 'hotel');
$encrypt = Password::hash("decrepito2");
if ($link) {
	$sql = 'select rate from ';
	$balance =0;

	$result = $link->query($sql);
} else
	echo 'Error';
if (isset($result))
	$result->close();
$link->close();

