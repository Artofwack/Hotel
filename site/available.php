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

$checkIN = convertDates($checkIN);
$checkOUT = convertDates($checkOUT);

for ($type = 1; $type < 6; $type++) {
	$res = checkAvailability($checkIN, $checkOUT, $type);
	$arr[$type] = mysqli_num_rows($res);
}

if (isset($arr)) {
	$result = json_encode($arr);
	header('Content-Type: application/json');
	echo $result;
}
