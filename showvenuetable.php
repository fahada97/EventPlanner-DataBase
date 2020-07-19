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


<table>
<div id=header>
	<h1>Venue Table</h1>
</div>
	<tr>
		<td>Venue Id</td>
		<td>Venue Description</td>
		<td>Venue Price</td>
		<td>Venue Vender</td>
	</tr>



<?php
@$dbConnect = new mysqli('localhost', 'root', '', 'eventplanner');
if (mysqli_connect_errno()) {
	echo ("<p>Error: Unable to connect to database.</p>" .
			"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
	exit;
	}
 

$data = mysqli_query(@$dbConnect, "SELECT * FROM tblvenue") 
 or die("Unable to select data"); 
 #$info = mysqli_fetch_array($data);

 while($info = mysqli_fetch_array( $data )) 
 { 
 echo "<tr>";  
 echo "<td>" .$info['venueid'] . "</td>";
 echo "<td>".$info['venuedesc'] . " </td>";
 echo "<td>".$info['venueprice']. " </td>";
 echo "<td>" .$info['venuevendor']. " </td>";
 echo "</tr>";
 } 
include'showfoodtable.php';
?>
	


</table>
</body>
</html>