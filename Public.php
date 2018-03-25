<?php include "template/header.php"; 
include "install.php";
if ($db_conn) {
	$RecreationCenter = $_POST['RecreationCenter'];
	echo $RecreationCenter;
	$result = executePlainSQL("Select * from recreation_center where rc_name = '" . $RecreationCenter . "'");
	printResult($result) ;	
}


?>
<html>
<h2>Look for Recreational Programs</h2>
<h3>Search by</h3>

<form method="post">
	<label for="Recreation Center">Recreation Center</label>
	<input type="text" name="RecreationCenter">
	<label for="Event">Event</label>
	<input type="text" name="Event" id="Event">
	<label for="Cost Range">Cost range</label>
	<input type="integer" name="costmin" >
	<input type="integer" name="costmax" >
	<label for="Time Range">Time range</label>
	<input type="integer" name="timemin" >
	<input type="integer" name="timemax" >
	<input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back</a>
<html>

<?php include "template/footer.php"; ?>
