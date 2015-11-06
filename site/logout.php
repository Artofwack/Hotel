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
	session_destroy();
	header('Location: hotel.php');