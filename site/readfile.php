<?php
	/**
	 * File: readfile.php
	 *
	 * Created by PhpStorm.
	 * User: ArtofWack
	 * Date: 11/1/2015
	 * Time: 8:03 PM
	 */


	$filestring = '../files/' . $_REQUEST['file'];
	echo $filestring;
	$file = fopen($filestring, "r");
	if ($file) {
		$filesize = filesize($filestring);
		$text = fread($file, $filesize);
		fclose($file);
		echo $text;
	}else
		echo "error";