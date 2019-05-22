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
$sana = $_GET['sana'];
echo "sananalku";
echo $sana;
echo "sananloppu";

// Escape User Input to help prevent SQL Injection
//$age = mysql_real_escape_string($age);
//$sex = mysql_real_escape_string($sex);
//$wpm = mysql_real_escape_string($wpm);
	
//build query
$query = "SELECT * FROM haku WHERE keyword like '%$sana%'";

	
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

// Insert a new row in the table for each person returned
//while($row = mysqli_fetch_array($qry_result)) {
 while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
   $display_string .= "<tr>";
   $display_string .= "<td>$row[keyword]</td>";
   $display_string .= "<td>$row[picture_id]</td>";
   $display_string .= "<td>$row[user_id]</td>";
   $display_string .= "</tr>";
}

echo "Query: " . $query . "<br />";
$display_string .= "</table>";

echo $display_string;
?>