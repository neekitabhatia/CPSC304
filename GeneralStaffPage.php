<?php include "template/header.php"; ?>
<html>
<h2>General Staff</h2>
<h3>Logged in</h3>


<h3>Register Customer</h3>
<form method="post">
	<label for="Name">Name</label>
	<input type="text" name="Name" id="Name">
	<label for="Address">address</label>
	<input type="text" name="address" id="address">
	<label for="Phone Number">Phone Number</label>
	<input type="integer" name="Phone Number" id="Phone Number">
	<input type="submit" name="submit" value="Submit">
</form>

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
	<input type="submit" name="submit" value="Submit">
</form>

<h3>Transaction Record</h3>
<form method="post">
	<label for="TransactionID">Transaction ID</label>
	<input type="integer" name="TransactionID" id="TransactionID">
	<?php echo "or"; ?>
	<label for="AccountID">Account ID</label>
	<input type="integer" name="AccountID" id="AccountID">
	<input type="submit" name="submit" value="Submit">
</form>

<h3>Purchase</h3>
<form method="post">
	<label for="AccountID">Account ID</label>
	<input type="integer" name="AccountID" id="AccountID">
	<label for="CardNumber">Card Number</label>
	<input type="integer" name="CardNumber" id="CardNumber">
	<label for="Date">Date</label>
	<input type="integer" name="Date" id="Date">
	<label for="EventID">Event ID</label>
	<input type="integer" name="EventID" id="EventID">
	<input type="submit" name="submit" value="Submit">
</form>

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
	<input type="submit" name="submit" value="Submit">
</form>

<h3>Create Event</h3>
<form method="post">
	<label for="Name">Name</label>
	<input type="text" name="Name" id="Name">
	<label for="Type">Type</label>
	<input type="text" name="Type" id="Type">
	<label for="Cost">Cost</label>
	<input type="integer" name="Cost" id="Cost">
	<label for="Time">Time</label>
	<input type="integer" name="Time from" id="Time">
	<input type="integer" name="Time to" id="Time">
	<label for="RoomID">Room ID</label>
	<input type="integer" name="RoomID" id="RoomID">
	<input type="submit" name="submit" value="Submit">
</form>

<h3>Delete Event</h3>
<form method="post">
	<label for="EventId">Event Id</label>
	<input type="integer" name="EventId" id="EventId">
	<input type="submit" name="submit" value="Submit">
</form>

<h3>Edit Event</h3>
<form method="post">
	<label for="EventId">Event Id</label>
	<input type="integer" name="EventId" id="EventId">
	<label for="Name">Name</label>
	<input type="text" name="Name" id="Name">
	<label for="Type">Type</label>
	<input type="text" name="Type" id="Type">
	<label for="Cost">Cost</label>
	<input type="integer" name="Cost" id="Cost">
	<label for="Time">Time</label>
	<input type="integer" name="Time from" id="Time">
	<input type="integer" name="Time to" id="Time">
	<label for="RoomID">Room ID</label>
	<input type="integer" name="RoomID" id="RoomID">
	<input type="submit" name="submit" value="Submit">
</form>




<a href="GeneralStaff.php">Logout</a>

<html>

<?php include "template/footer.php"; ?>