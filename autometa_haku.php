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
//mysql_connect($dbhost, $dbuser, $dbpass);
$mysqli = new mysqli("$dbhost", "$dbuser", "$dbpass", "$dbname");
	
//Select Database
//mysql_select_db($dbname) or die(mysql_error());
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//print "test	";
// Retrieve data from Query String
$sana = $_GET['sana'];

// Escape User Input to help prevent SQL Injection
//$age = mysql_real_escape_string($age);
//$sex = mysql_real_escape_string($sex);
//$wpm = mysql_real_escape_string($wpm);
	
//build query
$query = "SELECT * FROM haku WHERE keyword LIKE '%$sana%' ORDER BY user_id, keyword, picture_id";

	
//Execute query
//$qry_result = mysql_query($query) or die(mysql_error());
//mysqli_query($mysqli, "SELECT * FROM ajax_example WHERE sex = '$sex'");
$result=mysqli_query($mysqli, $query);
//print $query;

//Build Result String
$display_string = "<table>";
$display_string .= "<tr>";
$display_string .= "<th>Keyword</th>";
$display_string .= "<th>Picture_id</th>";
$display_string .= "<th>User_id</th>";
$display_string .= "</tr>"; 

// Insert a new row in the table for each keyword returned
//while($row = mysqli_fetch_array($qry_result)) {
 while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
   $display_string .= "<tr>";
   $display_string .= "<td><font color=#f35656 size=6>$row[keyword]</td>";
   $link_id = $row[picture_id];
   $display_string .= "<td><a href=$link_id>$row[picture_id]<img src=$link_id style=width:50px;height:50px;></a></td>";
   $display_string .= "<td>$row[user_id]</td>";         
//   $display_string .= "<td>$row<a href='https://www.google.com/'>demo text</a></td>";
   $display_string .= "</tr>";  
}

//echo "Query: " . $query . "<br />";
$display_string .= "</table>";

echo $display_string;
?>