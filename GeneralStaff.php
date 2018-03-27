<?php
include "template/header.php";
include "install.php";
?>

<html>
<h2>General Staff</h2>
<h3>Logged in</h3>

<h3>Register Customer</h3>
<form method="post">
	<label for="ID">ID</label>
	<input type="integer" name="ID" id="id">
	<label for="Name">Name</label>
	<input type="text" name="Name" id="name">
	<label for="Address">address</label>
	<input type="text" name="Address" id="address">
	<label for="Phone Number">Phone Number</label>
	<input type="integer" name="PhoneNumber" id="phoneNumber">
	<input type="submit" name="rcsubmit" value="Submit">
</form>

<?php

// Create new account
if(array_key_exists('Name', $_POST)){
	$id = $_POST["ID"];
	$name = $_POST["Name"];
	$address = $_POST["Address"];
	$pnum = $_POST["PhoneNumber"];
	executePlainSQL("insert into account values ('" . $id . "','". $name . "', '" . $address . "', '" . $pnum . "')");
	OCICommit($db_conn);
}
?>

<h3>Update Account</h3>
<form method="post">
	<label for="AccountID">Account ID</label>
	<input type="integer" name="AccountID" id="AccountID">
	<label for="Name">Name</label>
	<input type="text" name="Name" id="Name">
	<label for="Address">address</label>
	<input type="text" name="address" id="address">
	<label for="Phone Number">Phone Number</label>
	<input type="integer" name="Phone Number" id="Phone Number">
	<input type="submit" name="uasubmit" value="Submit">
</form>

<h3>Transaction Record</h3>
<form method="post">
	<label for="TransactionID">Transaction ID</label>
	<input type="integer" name="TransactionID" id="TransactionID">
	<?php echo "or"; ?>
	<label for="AccountID">Account ID</label>
	<input type="integer" name="trAccountID" id="trAccountID">
	<input type="submit" name="trsubmit" value="Submit">
</form>

<?php
$trans_id = "'" . (string)$_POST['TransactionID'] . "'";
$string = "select " . "*" . " from " . "trans_purchase" . " where tp_transaction_id = " . $trans_id;
$result = executePlainSQL($string);
while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		echo "<br> transaction id: " . $row[0]; //tp_transaction_id
		echo "<br> CardNumber: " . $row[1]; //tp_card_number
		echo "<br> Amount: " . $row[2] . "$"; //tp_amount
		echo "<br> Date: " . $row[3]; //tp_date
		echo "<br> AccountID: " . $row[4]; //account_id
		echo "<br> EventID: " . $row[5]; //eb_id
		echo "<br> Time In: " . $row[6]; //eb_time_in
		echo "<br> Time Out: " . $row[7]; //eb_time_out
		echo "<br> RoomID: " . $row[8]; //fc_room_id
	}
?>

<?php
$trans_id = "'" . (string)$_POST['trAccountID'] . "'";
$string = "select " . "*" . " from " . "trans_purchase" . " where account_id = " . $trans_id;
$result = executePlainSQL($string);
while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		echo "<br> transaction id: " . $row[0]; //tp_transaction_id
		echo "<br> CardNumber: " . $row[1]; //tp_card_number
		echo "<br> Amount: " . $row[2] . "$"; //tp_amount
		echo "<br> Date: " . $row[3]; //tp_date
		echo "<br> AccountID: " . $row[4]; //account_id
		echo "<br> EventID: " . $row[5]; //eb_id
		echo "<br> Time In: " . $row[6]; //eb_time_in
		echo "<br> Time Out: " . $row[7]; //eb_time_out
		echo "<br> RoomID: " . $row[8]; //fc_room_id
	}
?>

<h3>Purchase</h3>
<form method="post">
	<label for="trID">TransactionID</label>
	<input type="integer" name="trID" id="trID">
	<label for="AccountID">Account ID</label>
	<input type="integer" name="AccountID" id="AccountID">
	<label for="CardNumber">Card Number</label>
	<input type="integer" name="CardNumber" id="CardNumber">
	<label for="Date">Date</label>
	<input type="integer" name="Date" id="Date">
	<label for="EventID">Event ID</label>
	<input type="integer" name="EventID" id="EventID">
	<input type="submit" name="psubmit" value="Submit">
</form>


<?php
$booleanlong = array_key_exists('AccountID', $_POST) && array_key_exists('CardNumber', $_POST) && array_key_exists('Date', $_POST) && array_key_exists('EventID', $_POST);
if($booleanlong){
	$trID = $_POST["trID"];
	$cardN = $_POST["CardNumber"];
	$date = $_POST["Date"];
	$aID = $_POST["AccountID"];
	$EventID = $_POST["EventID"];
  $string = "select " . "eb_cost" . " from " . "event_booking" . " where eb_id = " . "'" . $EventID . "'";
	$result = executePlainSQL($string);
	while ($row = OCI_Fetch_Array($result, OCI_BOTH)){
		$cost = $row[0];
	}
	$stringf = "insert into trans_purchase values ('" . $trID . "','". $cardN . "', '" . $cost . "', '" . $date . "', '" . $aID . "', '" . $EventID . "')";
	executePlainSQL($stringf);
	OCICommit($db_conn); //should function if good connection to server
	}
?>

<h3>Refund</h3>
<form method="post">
	<label for="AccountID">Account ID</label>
	<input type="integer" name="AccountID" id="AccountID">
	<label for="Amount">Amount</label>
	<input type="integer" name="Amount" id="Amount">
	<label for="Date">Date</label>
	<input type="integer" name="Date" id="Date">
	<label for="EventID">Event ID</label>
	<input type="integer" name="EventID" id="EventID">
	<input type="submit" name="rsubmit" value="Submit">
</form>

<h3>Create Event</h3>
<form method="post">
	<label for="EventID">EventID</label>
	<input type="integer" name="ceEventID" id="ceEventID">
	<label for="Name">Name</label>
	<input type="text" name="ceName" id="ceName">
	<label for="Type">Type</label>
	<input type="text" name="Type" id="Type">
	<label for="Cost">Cost</label>
	<input type="integer" name="Cost" id="Cost">
	<label for="Date">Date</label>
	<input type= "integer" name="ceDate" id="Date">
	<label for="Time">Time</label>
	<input type="integer" name="ceTimeFrom" id="Time">
	<input type="integer" name="ceTimeTo" id="Time">
	<label for="RoomID">Room ID</label>
	<input type="integer" name="ceRoomID" id="ceRoomID">
	<input type="submit" name="cesubmit" value="Submit">
</form>

<?php
$booleanLong = array_key_exists('ceEventID', $_POST) && array_key_exists('ceName', $_POST) && array_key_exists('Type', $_POST) && array_key_exists('Cost', $_POST) && array_key_exists('ceDate', $_POST) && array_key_exists('ceTimeFrom', $_POST) && array_key_exists('ceTimeTo', $_POST) && array_key_exists('ceRoomID', $_POST);
if($booleanLong){
				$string = "insert into event_booking values ('" . $_POST["ceEventID"] . "', '" . $_POST["ceName"] . "', '" . $_POST["Type"] . "', '" . $_POST["Cost"] . "', '" . $_POST["ceDate"] . "', '" . $_POST["ceTimeFrom"] . "', '" . $_POST["ceTimeTo"] . "', '" . $_POST["ceRoomID"] . "')";
				executePlainSQL($string);
				OCICommit($db_conn);
		}
?>

<h3>Delete Event</h3>
<form method="post">
	<label for="EventId">Event Id</label>
	<input type="integer" name="delEventId" id="delEventId">
	<input type="submit" name="delsubmit" value="Submit">
</form>

<?php
	if(array_key_exists('delEventId', $_POST)){
		$string = "delete from event_booking where eb_id = " . $_POST["delEventId"];
		OCICommit($db_conn);
	}
?>

<h3>Edit Event</h3>
<form method="post">
	<label for="EventId">Event Id</label>
	<input type="integer" name="eeEventId" id="eeEventId">
	<label for="eeName">Name</label>
	<input type="text" name="eeName" id="Name">
	<label for="eeType">Type</label>
	<input type="text" name="eeType" id="eeType">
	<label for="eeCost">Cost</label>
	<input type="integer" name="eeCost" id="eeCost">
	<label for="eeDate">Date</label>
	<input type="integer" name="eeDate" id="eeDate">
	<label for="Time">Time</label>
	<input type="integer" name="eeTimeFrom" id="Time">
	<input type="integer" name="eeTimeTo" id="Time">
	<label for="RoomID">Room ID</label>
	<input type="integer" name="eeRoomID" id="RoomID">
	<input type="submit" name="eesubmit" value="Submit">
</form>

<?php
if(array_key_exists('eeEventId', $_POST)){

	$event_id = "'" . (string)$_POST['eeEventId'] . "'";
	$string = "select " . "*" . " from " . "event_booking" . " where eb_id = " . $event_id;
	$result = executePlainSQL($string);
	while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
			$eeEventId = $row[0]; //eb_id
			$eeName = $row[1]; //eb_name
			$eeType = $row[2]; //eb_type
			$eeCost = $row[3]; //eb_cost
			$eeDate = $row[4]; //eb_date
			$eeTIn = $row[5];  //eb_time_in
			$eeTOut = $row[6]; //eb_time_out
			$eeRoom = $row[7]; //eb_room_id
		}
		if(array_key_exists('eeName', $_POST)){
			$eeName = $_POST["eeName"];
		}

		if(array_key_exists('eeType', $_POST)){
			$eeType = $_POST["eeType"];
		}

		if(array_key_exists('eeCost', $_POST)){
			$eeCost = $_POST["eeCost"];
		}

		if(array_key_exists('eeDate', $_POST)){
			$eeDate = $_POST["eeDate"];
		}

		if(array_key_exists('eeTimeFrom', $_POST)){
			$eeTIn = $_POST["eeTimeFrom"];
		}

		if(array_key_exists('eeTimeTo', $_POST)){
			$eeTOut = $_POST["eeTimeTo"];
		}

		if(array_key_exists('eeRoomID', $_POST)){
			$eeRoom = $_POST["eeRoomID"];
		}

		$string = "delete from event_booking where eb_id = " . $_POST["eeEventId"];
		OCICommit($db_conn);

		$stringf = "insert into event_booking values ('" . $eeEventId . "', '" . $eeName . "', '" . $eeType . "', '" . $eeCost . "', '" . $eeDate . "', '" . $eeTIn . "', '" . $eeTOut . "', '" . $eeRoom . "')";
		executePlainSQL($stringf);
		OCICommit($db_conn);
}

?>
<a href="index.php">Back</a>

<html>

<?php include "template/footer.php"; ?>
