<?php
/**
 * File: adminTable.php
 *
 * Created by PhpStorm.
 * User: ArtofWack
 * Date: 1/27/2016
 * Time: 8:38 PM
 */

require_once('../config.php');

switch ($_POST['request']) {
	case 'guests':
		showGuests($link);
		break;
	case 'reservations':
		showRes($link);
		break;
	case 'rooms':
		checkRooms($link);
		break;
	case 'checkIN':
		checkIN($link, $_POST['guestID']);
		console($link, $_POST['guestID']);
		break;
	case 'checkOUT':
		checkOUT($link, $_POST['guestID']);
		console($link, $_POST['guestID']);
		break;
	case 'payment':
		payment($link, $_POST['guestID']);
		console($link, $_POST['guestID']);
		break;
	case 'console':
		console($link, $_POST['guestID']);
		break;
	default:
		break;
}

/**
 * List guests registered accounts
 *
 * @param $link
 */
function showGuests($link)
{
	$sql = 'SELECT guestID, firstName, lastName, email, checkedIn, balance FROM guests;';
	$result = $link->query($sql);

	echo "<table class='uk-table ' id='userTable'><tr><th></th><th>GUEST NAME</th><th>EMAIL</th><th>CHECKED IN</th><th>BALANCE</th></tr>";

	foreach($result as $row){
		echo '<tr id="' . $row['guestID'] . '">';
		echo '<td><button type="button" class="uk-button guestSel" guest="'.$row['guestID'].'" data-uk-switcher-item="3">Select</button></td>';
		echo '<td>' . strtoupper($row['firstName']) . " " . strtoupper($row['lastName']) . '</td>';
		echo '<td>' . strtoupper($row['email']). '</td>';
		$check = $row['checkedIn'] === '1' ? "TRUE" : "FALSE";
		echo '<td>' . $check . '</td>';
		echo '<td>' . $row['balance'] . '</td>';
		echo '</tr>';
	}
	echo '</table>';
}


/**
 * List current and future reservations
 *
 * @param $link
 */
function showRes($link)
{

}


/**
 * List rooms currently occupied
 *
 * @param $link
 */
function checkRooms($link)
{

}


/**
 * Check guests IN
 *
 * @param $link
 * @param $guestID
 */
function checkIN($link, $guestID)
{
	$sql = 'UPDATE guests SET checkedIn=TRUE WHERE guestID="'. $guestID .'";';
	$link->query($sql);
}


/**
 * Check guests OUT
 *
 * @param $link
 * @param $guestID
 */
function checkOUT($link, $guestID)
{
	$sql = 'UPDATE guests SET checkedIn=FALSE WHERE guestID="'. $guestID .'";';
	$link->query($sql);
}


/**
 * Load admin console with selected guest's info
 *
 * @param $link
 * @param $guestID
 */
function console($link, $guestID)
{
	$sql = 'SELECT firstName, lastName, checkedIN, balance FROM guests WHERE guestID="'. $guestID .'";';
	$res = $link->query($sql)->fetch_assoc();
	$result = array('name'=>strtoupper($res['firstName']) . " " . strtoupper($res['lastName']), 'check'=>$res['checkedIN'], 'balance'=>$res['balance']);

	echo json_encode($result);
}


/**
 * Accept guests payment to clear balance
 *
 * @param $link
 * @param $guestID
 */
function payment($link, $guestID)
{
	$sql = 'UPDATE guests SET balance=0 WHERE guestID="'. $guestID .'"';
	$link->query($sql);
}
