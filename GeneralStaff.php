<?php 
include "template/header.php";
include "config.php"; # for db connectivity info

 if($_SERVER["REQUEST_METHOD"] == "POST") {
       // username and password sent from form 
      
       $myusername = mysqli_real_escape_string($db,$_POST['username']);
       $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
       $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
     $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

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

<a href="index.php">Back</a>

<html>

<?php include "template/footer.php"; ?>
