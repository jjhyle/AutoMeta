<!DOCTYPE html>
<html>
<head>
<style>
table, td, th {
  border: 1px solid orangered;
}

table {
  border-collapse: collapse;
  width: 50%;
}

th {
  text-align: left;
}
</style>
</head>
<body>

<?php

$dbhost = "localhost";
$dbuser = "admin";
$dbpass = "Q2werty1234";
$dbname = "autometa";
	
//Connect to MySQL Server
$mysqli = new mysqli("$dbhost", "$dbuser", "$dbpass", "$dbname");
	
//Select Database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//print "test	";
// Retrieve data from Query String
$sana = $_GET['querystr'];

//build query
$query = "SELECT gallery.keyword, pictures.picturename, pictures.location, users.username
FROM gallery
LEFT JOIN pictures ON gallery.picture_id=pictures.picture_id
LEFT JOIN users ON gallery.user_id=users.id
WHERE gallery.keyword LIKE '$sana%' ORDER BY users.username, gallery.keyword, pictures.picturename";
	
//Execute query
$result=mysqli_query($mysqli, $query);
//print $query;

//Build Result String
$display_string = "<table>";
$display_string .= "<tr>";
$display_string .= "<th>Keyword</th>";
$display_string .= "<th>Picture name</th>";
$display_string .= "<th>Location</th>";
$display_string .= "<th>User name</th>";
$display_string .= "</tr>"; 

// Insert a new row in the table for each keyword returned
 while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
   $display_string .= "<tr>";
   $display_string .= "<td><font color=#f35656 size=6>$row[keyword]</td>";
   $link_id = $row[picturename];
   $display_string .= "<td><a href=$link_id>$row[picturename]<img src=$link_id style=width:50px;height:50px;></a></td>";
   $loc_id = $row[location];
   $display_string .= "<td><a href=$loc_id>$row[location]<img src=$loc_id style=width:50px;height:50px;></a></td>";
   $display_string .= "<td>$row[username]</td>";         
   // echo "<td>$row</td>";
   //   $display_string .= "<td>$row<a href='https://www.google.com/'>demo text</a></td>";
   $display_string .= "</tr>";  
} 
// echo "Query: " . $query . "<br />";;
$display_string .= "</table>";

echo $display_string;
?>