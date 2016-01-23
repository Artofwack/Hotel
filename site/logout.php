<?php
	/**
	 * File: logout.php
	 *
	 * Created by PhpStorm.
	 * User: ArtofWack
	 * Date: 10/31/2015
	 * Time: 9:40 PM
	 */
	session_start();

	$file = fopen("../files/guestLOG.log", "a");
	if ($file) {
		fwrite($file, $_SESSION['email'] . "\t Logged Out          @ " . date('m-d-Y - H:i:s') . "\n");
		fclose($file);
	}

	session_destroy();
	header('Location: hotel.php');
