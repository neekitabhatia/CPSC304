<?php include "template/header.php"; ?>
<html>
<h2>Managnment Staff</h2>
<h3>Logged in</h3>


<h3>Revenue from Time Range</h3>
<form method="post">
	<label for="Time">Time Range</label>
	<input type="text" name="time from" id="time">
	<input type="text" name="time to" id="time">
	<input type="submit" name="submit" value="Submit">
</form>

<h3>Account Information</h3>
<form method="post">
	<label for="AccountID">Account ID</label>
	<input type="text" name="AccountID" id="AccountID">
	<input type="submit" name="submit" value="Submit">
</form>

<h3>Booking Report</h3>
<form method="post">
	<label for="BookingID">Booking ID</label>
	<input type="text" name="BookingID" id="BookingID">
	<input type="submit" name="submit" value="Submit">
</form>

<h3>Create Facility</h3>
<form method="post">
	<label for="Name">name</label>
	<input type="text" name="name" id="name">
	<label for="Address">address</label>
	<input type="text" name="address" id="address">
	<input type="submit" name="submit" value="Submit">
</form>

<h3>Create New Room</h3>
<form method="post">
	<label for="Rec_center_name">Rec_center_name</label>
	<input type="text" name="Rec_center_name" id="Rec_center_name">
	<label for="Capacity">capacity</label>
	<input type="text" name="Capacity" id="Capacity">
	<input type="submit" name="submit" value="Submit">
</form>

<h3>Edit Facilty Information</h3>
<form method="post">
	<label for="Rec_center_name">Old Rec_center_name</label>
	<input type="text" name="Rec_center_name" id="Rec_center_name">
	<label for="Rec_center_name">New Rec_center_name</label>
	<input type="text" name="Rec_center_name" id="Rec_center_name">
	<input type="text" name="address" id="address">
	<input type="submit" name="submit" value="Submit">
	<input type="submit" name="submit" value="Submit">
</form>


<a href="ManagementStaff.php">Logout</a>

<html>

<?php include "template/footer.php"; ?>