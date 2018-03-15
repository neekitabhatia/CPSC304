<?php include "template/header.php"; ?>
<html>
<h2>Look for Recreational Programs</h2>
<h3>Search by</h3>

<form method="post">
	<label for="event">Event</label>
	<input type="text" name="event" id="event">
	<label for="Facility">Facility</label>
	<input type="text" name="facility" id="facility">
	<label for="cost">Cost</label>
	<input type="integer" name="cost" id="cost">
	<input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Management Login</a>
<html>

<?php include "template/footer.php"; ?>