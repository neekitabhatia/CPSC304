<html>
<h2>Managnment Staff</h2>
<h3>Logged in</h3>

<?php include "template/header.php"; 
include "install.php";
?>

<h3>Revenue during Time Range</h3>
<form method="post">
	<label for="Time">Time Range</label>
	<input type="text" name="timefrom" id="time">
	<input type="text" name="timeto" id="time">
	<input type="submit" name="submit" value="Submit">
</form>

<?php

// Revenue between time ranges (Time1, Time2)

$checkdates = array_key_exists('timefrom', $_POST) && array_key_exists('timeto', $_POST);

if($checkdates){

	$TimeFrom = $_POST['timefrom'];
	$TimeTo = $_POST['timeto'];

	$string = "select sum(tp_amount) from trans_purchase where tp_date > "  . $TimeFrom . "and tp_date <" . $TimeTo;
	$result = executePlainSQL($string);
	
	$row = OCI_Fetch_Array($result, OCI_BOTH);
	$ans = $row[0];
	echo "Total Revenue: " . $ans;
}

?>  

<h3>Account Information</h3>
<form method="post">
	<label for="AccountID">Account ID</label>
	<input type="text" name="AccountID" id="AccountID">
	<input type="submit" name="submit" value="Submit">
</form>

<?php 

// Account Information (Account ID) - Working

$AccountID = $_POST['AccountID'];

$string = "select * from account where account_id = '" . $AccountID . "'";
$result = executePlainSQL($string);

while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
	echo "Account Information for Customer: ";
    echo "<br> Account ID:" . $row[0]; //account_id
    echo "<br> Name: " . $row[1]; //ac_name
    echo "<br> Address: " . $row[2]; //ac_address
    echo "<br> Phone: " . $row[3] ; //ac_phone_number
}

?>

<h3>Booking Report</h3>
<form method="post">
	<label for="BookingID">Booking ID</label>
	<input type="text" name="BookingID" id="BookingID">
	<input type="submit" name="submit" value="Submit">
</form>

<?php 

// Retrieve Booking(Booking ID)

$BookingID = $_POST['BookingID'];

$string = "select * from event_booking where eb_id = '" . $BookingID . "'";
$result = executePlainSQL($string);

while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
	echo "Booking Information: " ;
    echo "<br> Booking ID: " . $row[0]; //bookingID
    echo "<br> Name: " . $row[1]; //eb_name
    echo "<br> Type: " . $row[2]; //ac_type
    echo "<br> Cost: : " . $row[3] ; //eb_cost
    echo "<br> TimeIn: " . $row[4]; //eb_timein
    echo "<br> TimeOut: " . $row[5]; //eb_time_out
    echo "<br> Room ID: : " . $row[6] ; //fc_room_id 

}

// Not doing anything

?>

<h3>Create Rec Center</h3>
<form method="post">
	<label for="Name">name</label>
	<input type="text" name="name" id="name">
	<label for="Address">address</label>
	<input type="text" name="address" id="address">
	<input type="submit" name="submit" value="Submit">
</form>

<?php 

// Create Rec Center - working

$checkRecCenter = array_key_exists('name', $_POST) && array_key_exists('address', $_POST); 

if($checkRecCenter){
	$rc_name = $_POST['name'];
	$rc_address = $_POST['address'];

	$string = "insert into recreation_center values ('" . $rc_name . "','" . $rc_address . "')";
	$result = executePlainSQL($string);
	OCICommit($db_conn);
}
?>

<h3>Edit Rec Center Information</h3>
<form method="post">
	<label for="Rec_center_name">Old Rec_center_name</label>
	<input type="text" name="Rec_center_name_old" id="Rec_center_name_new">
	<label for="Rec_center_name">New Rec_center_name</label>
	<input type="text" name="Rec_center_name_new" id="Rec_center_name_new">
	<label for="address">Addresse</label>
	<input type="text" name="address" id="address">
	<input type="submit" name="submit" value="Submit">
</form>

<?php 

// Update Rec Center - working

$rc_name_old = $_POST['Rec_center_name_old'];
$rc_name_new = $_POST['Rec_center_name_new'];
$rc_address = $_POST['address'];

$string = "update recreation_center set rc_name = '" . $rc_name_new . "', rc_address = '" . $rc_address . "' where rc_name = '" . $rc_name_old . "'";
$result = executePlainSQL($string);
OCICommit($db_conn);

?>

<h3>Create New Room</h3>
<form method="post">
	<label for="Rec_center_name">Rec_center_name</label>
	<input type="text" name="Rec_center_name" id="Rec_center_name">
	<label for="Room_id">Room_id</label>
	<input type="text" name="Room_id" id="Room_id">
	<label for="Capacity">capacity</label>
	<input type="text" name="Capacity" id="Capacity">
	<input type="submit" name="submit" value="Submit">
</form>

<?php 

// Create Room - Working 

$checkRoom = array_key_exists('Rec_center_name', $_POST) && array_key_exists('Room_id', $_POST) && array_key_exists('Capacity' , $_POST); 

if($checkRoom){
	$Room_id = $_POST['Room_id'];
	$Rec_center_name = $_POST['Rec_center_name'];
	$capacity = $_POST['Capacity'];

	$string = "insert into facilities_contains values ('" . $Room_id . "','" . $capacity . "','" . $Rec_center_name . "')";
	$result = executePlainSQL($string);
	OCICommit($db_conn);
}

?>


<a href="index.php">Back</a>

<html>


<?php include "template/footer.php"; ?>
