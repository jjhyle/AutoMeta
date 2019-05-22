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
print "test	";
// Retrieve data from Query String
$age = $_GET['age'];
$sex = $_GET['sex'];
$wpm = $_GET['wpm'];
//$age = 120;
//$sex = 'm';

print "$age , $sex, $wpm";
// Escape User Input to help prevent SQL Injection
//$age = mysql_real_escape_string($age);
//$sex = mysql_real_escape_string($sex);
//$wpm = mysql_real_escape_string($wpm);
	
//build query
$query = "SELECT * FROM ajax_example WHERE sex = '$sex'";

if(is_numeric($age))
   $query .= " AND age <= $age";

if(is_numeric($wpm))
   $query .= " AND wpm <= $wpm";
	
//Execute query
//$qry_result = mysql_query($query) or die(mysql_error());
//mysqli_query($mysqli, "SELECT * FROM ajax_example WHERE sex = '$sex'");
$result=mysqli_query($mysqli, $query);
//print $query;

//Build Result String
$display_string = "<table>";
$display_string .= "<tr>";
$display_string .= "<th>Name</th>";
$display_string .= "<th>Age</th>";
$display_string .= "<th>Sex</th>";
$display_string .= "<th>WPM</th>";
$display_string .= "</tr>";

// Insert a new row in the table for each person returned
//while($row = mysqli_fetch_array($qry_result)) {
 while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
   $display_string .= "<tr>";
   $display_string .= "<td>$row[name]</td>";
   $display_string .= "<td>$row[age]</td>";
   $display_string .= "<td>$row[sex]</td>";
   $display_string .= "<td>$row[wpm]</td>";
   $display_string .= "</tr>";
}

echo "Query: " . $query . "<br />";
$display_string .= "</table>";

echo $display_string;
?>