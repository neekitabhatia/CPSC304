<?php 
include "template/header.php";
include "config.php"; # for db connectivity info

// if($_SERVER["REQUEST_METHOD"] == "POST") {
//       // username and password sent from form 
      
//       $myusername = mysqli_real_escape_string($db,$_POST['username']);
//       $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
//       $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
//       $result = mysqli_query($db,$sql);
//       $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//       $active = $row['active'];
      
//       $count = mysqli_num_rows($result);
      
//       // If result matched $myusername and $mypassword, table row must be 1 row
		
//       if($count == 1) {
//          session_register("myusername");
//          $_SESSION['login_user'] = $myusername;
         
//          header("location: welcome.php");
//       }else {
//          $error = "Your Login Name or Password is invalid";
//       }
//    }
?>

<html>
<h2>General Staff</h2>
<h3>Login</h3>

<form method="post" action="GeneralStaff.php">
	<label for="Login">Login</label>
	<input type="text" name="Login" id="Login">
	<label for="Password">Password</label>
	<input type="text" name="Password" id="Password">
	<input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back</a>

<html>

<?php include "template/footer.php"; ?>