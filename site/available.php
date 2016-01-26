<?php
/**
 * File: available.php
 *
 * Created by PhpStorm.
 * User: ArtofWack
 * Date: 1/24/2016
 * Time: 11:35 PM
 */
require_once('../config.php');

$checkIN = $_POST['checkIN'];
$checkOUT = $_POST['checkOUT'];
$roomType = $_POST['roomType'];

$checkIN = convertDates($checkIN);
$checkOUT = convertDates($checkOUT);

$res = checkAvailability($checkIN, $checkOUT, $roomType);

echo '' . mysqli_num_rows($res);

