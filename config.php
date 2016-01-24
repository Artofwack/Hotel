<?php

/**
 * File: config.php
 * Created by PhpStorm.
 * User: ArtofWack
 * Date: 10/14/2015
 * Time: 10:28 AM
 */

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'decrepito2');
define('DB_DATABASE', 'hotel');

$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
if ($link->connect_error)
	die(" Error: " . $link->connect_errno . "  " . $link->connect_error);