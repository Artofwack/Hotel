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

require_once('../config.php');

$table = $_REQUEST['table'];

if ($link->query("SHOW TABLES LIKE '" . $table . "' ")->num_rows == 1) {

	$i = 0;
	$sql = 'SELECT * FROM ';
	$sql .= $table;
	$sql .= ';';
	$result = $link->query($sql);
	$fieldnames = $result->fetch_fields();

	echo '<table class="table table-bordered table-hover ';
	echo 'table-' . $table . '" >';
	echo '<thead><tr>';

	foreach ($fieldnames as $fieldname) {
		echo '<th>' . strtoupper($fieldname->name) . '</th>';
	}

	echo '</tr></thead><tbody data-link="row" class="rowlink">';

	foreach ($result as $res) {
		echo '<tr class="rowwy tab-gen" id="row-' . ++$i . '">';
		foreach ($res as $row) {
			echo '<td><a href=what.php?row=' . $i . ' target=_blank></a>' . $row . '</td>';
		}
		echo '</tr>';
	}

	echo '</tbody></table>';

	if (isset($result))
		$result->close();
} else
	echo 'No table found';
$link->close();