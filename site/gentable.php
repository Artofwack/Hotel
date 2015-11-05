<?php
/**
 * File: gentable.php
 *
 * Created by PhpStorm.
 * User: ArtofWack
 * Date: 11/3/2015
 * Time: 11:40 PM
 *
 * Generates a formatted table from a MYSQL table
 */

require_once('../connect_DB.php');

$table = $_REQUEST['table'];

if ($link->query("SHOW TABLES LIKE '" . $table . "' ")->num_rows == 1) {

	$i = 0;
	$sql = 'SELECT * FROM ';
	$sql .= $table;
	$sql .= ';';
	$result = $link->query($sql);
	$fieldnames = $result->fetch_fields();

	echo '<table class="table table-bordered ';
	echo 'table-' . $table . '">';
	echo '<tr>';

	foreach ($fieldnames as $fieldname) {
		echo '<th>' . strtoupper($fieldname->name) . '</th>';
	}

	echo '</tr>';

	foreach ($result as $res) {
		echo '<tr class="rowwy tab-gen" id="row-' . $i++ . '">';
		foreach ($res as $row) {
			echo '<td>' . $row . '</td>';
		}
		echo '</tr>';
	}

	echo '</table>';

	if (isset($result))
		$result->close();
} else
	echo 'No table found';
$link->close();