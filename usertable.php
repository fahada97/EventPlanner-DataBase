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

<div id=header>
	<h1>Thank You for Registering</h1>
</div>
<table>
	<tr>
		<td>User Id</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Email</td>
		<td>Phone</td>
		<td>Type</td>
	</tr>



<?php
@$dbConnect = new mysqli('localhost', 'root', '', 'eventplanner');
if (mysqli_connect_errno()) {
	echo ("<p>Error: Unable to connect to database.</p>" .
			"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
	exit;
	}
 
// get data from the input boxes 
$userid = $_POST['userid'];
$password = $_POST['password'];
$type = $_POST['type'];

if (!$userid || !$password || !$type) {
    echo "<p>You have not entered all the required information. </p>";
    exit;
}

// add slashes if add and strip slashes default is not turned on
// magic_quotes_gpc is off by default in XAMPP, add \ if value contains a quote
if (!get_magic_quotes_gpc()){
	$userid = addslashes($userid);
	$password = addslashes($password);
	$type = addslashes($type);
}

if($userid == 1 && $password == 'admin' && $type == 'admin')
{


$data = mysqli_query(@$dbConnect, "SELECT * FROM tbluser order by userId desc") 
 or die("Unable to select data"); 
 #$info = mysqli_fetch_array($data);

 while($info = mysqli_fetch_array( $data )) 
 { 
 echo "<tr>";  
 echo "<td>" .$info['userid'] . "</td>";
 echo "<td>".$info['firstname'] . " </td>";
 echo "<td>".$info['lastname']. " </td>";
 echo "<td>" .$info['email']. " </td>";
 echo "<td>" .$info['phone']. " </td>";
 echo "<td>" .$info['type']. " </td>";
 echo "</tr>";
 } 
?>
	<h1>Event Information</h1>

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
$data = mysqli_query(@$dbConnect, "SELECT * FROM tblevent") 
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
include'adminedit.html';
?>

<?php
}
else
{
echo "You are not an admin";

$data = mysqli_query(@$dbConnect, "SELECT * FROM tbluser where userid = '$userid' && password = '$password'") 
 or die("Unable to select data in else"); 
 #$info = mysqli_fetch_array($data);

 while($info = mysqli_fetch_array( $data )) 
 { 
 echo "<tr>";  
 echo "<td>" .$info['userid'] . "</td>";
 echo "<td>".$info['firstname'] . " </td>";
 echo "<td>".$info['lastname']. " </td>";
 echo "<td>" .$info['email']. " </td>";
 echo "<td>" .$info['phone']. " </td>";
 echo "<td>" .$info['type']. " </td>";
 echo "</tr>";
 } 
 ?>
	<h1>Event Information</h1>
	<h1>If you see a price of 0, please log back in a while to get a price.</h1>

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
}

include'backtoregistration.html';

?>



</table>
</body>
</html>