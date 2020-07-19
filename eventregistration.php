<!DOCTYPE html>
<html>
<head>
<style tyle="text/css">
h1 {
	text-align: center;
	}
table {
	text-align: center;
	vertical-align: middle;
	border: 2px solid black;
	border-collapse: collapse;
	margin: 20px auto;
	font-family: Verdana, Helvetica, serif;
	}
table tr:nth-child(even) {
	background-color: #ccc;
	}
table tr:first-child {
	border-bottom: 2px solid black;
	font-weight: bold;
	}
td {
	padding: 5px 15px 5px 15px;
	border: 1px solid black;
	}
</style>
</head>
<body>
<?php
@$dbConnect = new mysqli('localhost', 'root', '', 'eventplanner');
if (mysqli_connect_errno()) {
	echo ("<p>Error: Unable to connect to database.</p>" .
			"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
	exit;
	}

// get data from the input boxes 
$userid = $_POST['userid'];
$phone = $_POST['phone'];
$date = $_POST['datee'];
$guests = $_POST['guests'];
$eventtype = $_POST['eventtype'];
$venuetype = $_POST['venuetype'];
$foodtype = $_POST['foodtype'];	
$decorationtype = $_POST['decorationtype'];   

if (!$userid || !$phone || !$date || !$guests || !$eventtype || !$venuetype || !$foodtype || !$decorationtype) {
    echo "<p>You have not entered all the required information. </p>";
    exit;
}

// add slashes if add and strip slashes default is not turned on
// magic_quotes_gpc is off by default in XAMPP, add \ if value contains a quote
if (!get_magic_quotes_gpc()){
	$userid = addslashes($userid);
	$phone = addslashes($phone); 
	$date = addslashes($date);
	$guests = addslashes($guests);
	$eventtype = addslashes($eventtype);
	$venuetype = addslashes($venuetype);	
	$foodtype = addslashes($foodtype);
	$decorationtype = addslashes($decorationtype);
}

// insert into contact database
$sqlString = "INSERT into tblevent (datee, phone, guests, eventtype, venuetype, foodtype, decorationtype, userid, customerprice) 
		values	('$date', '$phone', '$guests', '$eventtype', '$venuetype','$foodtype', '$decorationtype', '$userid',' ')";
$result = $dbConnect->query($sqlString);
if (!$result){	
	echo ("<p>Error: Registration information was not added.</p>" .
			"<p>Error code $dbConnect->errno: $dbConnect->error. </p>");
	$dbConnect->close();
	exit;
	}

$dbConnect->close();
//** end of input processing

?>
<div id=header>
	<h1>Thank You for Registering</h1>
        <h1>If you see 0 for price, please log back in a while to get a price.</h1>
</div>
<table>
	<tr>
		<td>Event ID</td>
		<td>Date</td>
		<td>Phone</td>
		<td>Number of Guests</td>
		<td>Event Type</td>
		<td>Venue Type</td>
		<td>Food Type</td>
		<td>Decoration Type</td>
		<td>User ID</td>
		<td>Price</td>
	</tr>
<?php 
@$dbConnect = new mysqli('localhost', 'root', '', 'eventplanner');
if (mysqli_connect_errno()) {
	echo ("<p>Error: Unable to connect to database.</p>" .
			"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
	exit;
	}
$data = mysqli_query(@$dbConnect, "SELECT * FROM tblevent where userid = '$userid'") 
 or die("Unable to select data"); 
 #$info = mysqli_fetch_array($data);

 while($info = mysqli_fetch_array( $data )) 
 { 
 echo "<tr>";  
 echo "<td>" .$info['eventid'] . "</td>";
 echo "<td>".$info['datee'] . " </td>";
 echo "<td>".$info['phone']. " </td>";
 echo "<td>" .$info['guests']. " </td>";
 echo "<td>" .$info['eventtype']. " </td>";
 echo "<td>" .$info['venuetype']. " </td>";
 echo "<td>" .$info['foodtype']. " </td>";
 echo "<td>" .$info['decorationtype']. " </td>";
 echo "<td>" .$info['userid']. " </td>";
 echo "<td>" .$info['customerprice']. " </td>";
 echo "</tr>";
 } 

include'backtoregistration.html';
?>
</body>
</html>
