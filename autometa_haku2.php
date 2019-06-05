
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
$sana = $_GET['sana'];
	
//build query
$query = "SELECT * FROM keywords
WHERE keyword LIKE '$sana%' ORDER BY keyword";

//Execute query
$result=mysqli_query($mysqli, $query);
//print $query;

// Insert a new row in the table for each keyword returned
 while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  //  $response[] = array("value"=>$row['keyword_id'],"label"=>$row['keyword']);
    $response[] = array("label"=>$row['keyword']);
}

//echo "Query: " . $query . "<br />";;
echo json_encode($response);
// echo $response;
//echo json_encode($display_string);

// echo $display_string;
?>