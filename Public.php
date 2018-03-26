<?php include "template/header.php"; 
?>
<html>
<h2>Look for Recreational Programs</h2>
<h3>Search by</h3>

<form method="POST" action="Public.php">
	<label for="Recreation Center">Recreation Center</label>
	<input type="text" name="recname">
	<label for="Event">Event Name</label>
	<input type="text" name="ename">
    <label for="Cost Range">Cost range</label>
	<input type="integer" name="cmin" >
	<input type="integer" name="cmax" >
	<label for="Time Range">Time range</label>
	<input type="integer" name="tmin" >
	<input type="integer" name="tmax" >  
	<input type="submit" name="submit" value="submit">
</form>
<br> 
<center>
<?php 
include "install.php";

if (array_key_exists('submit', $_POST)) {
 	$recname = $_POST['recname'];
    $ename = $_POST['ename'];
    $cmin = $_POST['cmin'];
    $cmax = $_POST['cmax'];
    $tmin = $_POST['tmin'];
    $tmax = $_POST['tmax'];

    $string = "SELECT recreation_center.rc_name " .
             "FROM recreation_center, facilities_contains, event_booking " .
              "WHERE recreation_center.rc_name = facilities_contains.rc_name AND facilities_contains.fc_room_id = event_booking.fc_room_id ";

              //   "FROM recreation_center " .
              // "INNER JOIN facilities_contains ON recreation_center.rc_name = facilities_contains.rc_name " . 
              // "INNER JOIN event_booking ON facilities_contains.fc_room_id = event_booking.fc_room_id " .
              // "WHERE ";

    
    if (!empty($recname)){
                $string .= "AND recreation_center.rc_name = '" . $recname . "'";
                }

    if (!empty($ename)){
                $string .= "AND eb_name = '" . $ename . "'";
                }

    if (!empty($cmin)){
                $string .= "AND eb_cost > '" . $cmin . "'";
                }

    if (!empty($cmax)){
                $string .= "AND eb_cost < '" . $cmax . "'";
                }

    if (!empty($tmin)){
                $string .= "AND eb_time_in > '" . $tmin . "'";
                }

    if (!empty($tmax)){
                $string .= "AND eb_time_in < '" . $tmax . "'";
                }

    $result = executePlainSQL($string);

    while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
             echo $row[0]; // it wont print :(
             echo $row[1]; // it wont print :(

          }
//     while (($row = oci_fetch_assoc($result)) != false) {
//     echo $row['DEPARTMENT_ID'] . " " . $row['DEPARTMENT_NAME'] . "<br>\n";
// }
   }
  
?>
</center>
<br> 
<a href="index.php">Back</a>
<br> 
<html>

<?php include "template/footer.php"; ?>
