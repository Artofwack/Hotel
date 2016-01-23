<?php
/**
 * File: genmapxml.php
 *
 * Created by PhpStorm.
 * User: ArtofWack
 * Date: 1/22/2016
 * Time: 3:49 PM
 */

require_once('../config.php');

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
if ($link->connect_error)
	die(" Error: " . $link->connect_error);

$sql = 'SELECT * FROM markers;';

$result = $link->query($sql);

header("Content-type: text/xml");

while ($row = $result->fetch_assoc()) {
	// ADD TO XML DOCUMENT NODE
	$node = $dom->createElement("marker");
	$newnode = $parnode->appendChild($node);
	$newnode->setAttribute("name", $row['name']);
	$newnode->setAttribute("address", $row['address']);
	$newnode->setAttribute("lat", $row['lat']);
	$newnode->setAttribute("lng", $row['lng']);
	$newnode->setAttribute("type", $row['type']);
}

echo $dom->saveXML();
