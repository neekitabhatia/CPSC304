<?php include "template/header.php"; ?>
<html>
<h2>Look for Recreational Programs</h2>
<h3>Search by</h3>

<form method="post">
	<label for="Recreation Center">Recreation Center</label>
	<input type="text" name="Recreation Center" id="Recreation Center">
	<label for="Event">Event</label>
	<input type="text" name="Event" id="Event">
	<label for="Cost Range">Cost range</label>
	<input type="integer" name="cost min" id="cost min">
	<input type="integer" name="cost max" id="cost max">
	<label for="Time Range">Time range</label>
	<input type="integer" name="time min" id="time min">
	<input type="integer" name="time max" id="time max">
	<input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back</a>
<html>

<?php include "template/footer.php"; ?>