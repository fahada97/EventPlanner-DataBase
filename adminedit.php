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
$eventid = $_POST['eventid'];
$venueid = $_POST['venueid'];
$foodid = $_POST['foodid'];	
$decorationid = $_POST['decorationid'];   

if (!$eventid || !$venueid || !$foodid || !$decorationid) {
    echo "<p>You have not entered all the required information. </p>";
    exit;
}

// add slashes if add and strip slashes default is not turned on
// magic_quotes_gpc is off by default in XAMPP, add \ if value contains a quote
if (!get_magic_quotes_gpc()){	
	$eventid = addslashes($eventid);
	$venueid = addslashes($venueid);
	$foodid = addslashes($foodid);
	$decorationid = addslashes($decorationid);

}
$guest = mysqli_query(@$dbConnect, "SELECT guests FROM tblevent where eventid = '$eventid'") 
 or die("Unable to select data"); 
 #$info = mysqli_fetch_array($data);

 while($info = mysqli_fetch_array( $guest )) 
 { 
 echo "<tr>";  
 echo "<td>" .$info['guests'] . "</td>";
$guests = $info['guests'];
 echo "</tr>";
 }
$venue = mysqli_query(@$dbConnect, "SELECT venueprice FROM tblvenue where venueid = '$venueid'") 
 or die("Unable to select data"); 
 #$info = mysqli_fetch_array($data);

 while($info = mysqli_fetch_array( $venue )) 
 { 
 echo "<tr>";  
 echo "<td>" .$info['venueprice'] . "</td>";
$Vprice = $info['venueprice'];
 echo "</tr>";
 }
$food = mysqli_query(@$dbConnect, "SELECT foodprice FROM tblfood where foodid = '$foodid'") 
 or die("Unable to select data"); 
 #$info = mysqli_fetch_array($data);

 while($info = mysqli_fetch_array( $food )) 
 { 
 echo "<tr>";  
 echo "<td>" .$info['foodprice'] . "</td>";
$Fprice = $info['foodprice'];
 echo "</tr>";
 }
$decoration = mysqli_query(@$dbConnect, "SELECT decorationprice FROM tbldecoration where decorationid = '$decorationid'") 
 or die("Unable to select data"); 
 #$info = mysqli_fetch_array($data);

 while($info = mysqli_fetch_array( $decoration )) 
 { 
 echo "<tr>";  
 echo "<td>" .$info['decorationprice'] . "</td>";
$Dprice = $info['decorationprice'];
 echo "</tr>";
 }


$Aprice = $Vprice + ($Fprice * $guests) + $Dprice; 
echo "Sum: ",$Aprice; 
$Cprice = $Aprice + ($Aprice * .2);
echo "C: ", $Cprice;

// insert into contact database
$sqlString = mysqli_query(@$dbConnect,"UPDATE tblevent SET venueid = '$venueid', foodid = '$foodid', decorationid = '$decorationid', customerprice = $Cprice, adminprice = $Aprice WHERE eventid = '$eventid'");

$dbConnect->close();
//** end of input processing

?>
<div id=header>
	<h1>Event Information</h1>
</div>
<table>
	<tr>
		<td>Event ID</td>
		<td>Date</td>
		<td>Phone</td>
		<td>Number of Guests</td>
		<td>Event Type</td>
		<td>Venue Type</td>
		<td>Venue ID</td>
		<td>Food Type</td>
		<td>Food ID</td>
		<td>Decoration Type</td>
		<td>Decoration ID</td>
		<td>User ID</td>
		<td>Customer Price</td>
		<td>Admin Price</td>
	</tr>
<?php 
@$dbConnect = new mysqli('localhost', 'root', '', 'eventplanner');
if (mysqli_connect_errno()) {
	echo ("<p>Error: Unable to connect to database.</p>" .
			"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
	exit;
	}
$data = mysqli_query(@$dbConnect, "SELECT * FROM tblevent where eventid = '$eventid'") 
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
 echo "<td>" .$info['venueid']. " </td>";
 echo "<td>" .$info['foodtype']. " </td>";
 echo "<td>" .$info['foodid']. " </td>";
 echo "<td>" .$info['decorationtype']. " </td>";
 echo "<td>" .$info['decorationid']. " </td>";
 echo "<td>" .$info['userid']. " </td>";
 echo "<td>" .$info['customerprice']. " </td>";
 echo "<td>" .$info['adminprice']. " </td>";
 echo "</tr>";
 } 

include'backtoregistration.html';
?>
</body>
</html>
