<?php
	/**
	 * File: connect_DB.php
	 *
	 * Created by PhpStorm.
	 * User: ArtofWack
	 * Date: 11/4/2015
	 * Time: 12:15 AM
	 */

	require_once('config.php');

	$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
	if ($link->connect_error)
		die(" Error: " . $link->connect_errno . "  " . $link->connect_error);