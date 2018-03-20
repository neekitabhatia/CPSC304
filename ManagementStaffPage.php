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


<a href="ManagementStaff.php">Logout</a>

<html>

<?php include "template/footer.php"; ?>