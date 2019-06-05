
<?php

/*$dbhost = "localhost";
$dbuser = "admin";
$dbpass = "Q2werty1234";
$dbname = "autometa";
	
//Connect to MySQL Server
$mysqli = new mysqli("$dbhost", "$dbuser", "$dbpass", "$dbname");
	
//Select Database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
*/

/*
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
*/
if(isset($_POST['querystr'])){

    $conn = new mysqli('localhost', 'admin', 'Q2werty1234', 'autometa');
$results = array('error' => false, 'data' => '');
$querystr = $_POST['querystr'];
if(empty($querystr)){
    $results['error'] = true;
}else{
    $sql = "SELECT * FROM keywords WHERE keyword LIKE '$querystr%'";
    $sqlquery = $conn->query($sql);
    if($sqlquery->num_rows > 0){
        while($ldata = $sqlquery->fetch_assoc()){
            $results['data'] .= "
                <li class='list-gpfrm-list' data-fullname='".$ldata['keyword']."'>".$ldata['keyword']." ".$ldata['sirname']."</li>
            ";
        }
    }
    else{
        $results['data'] = "
            <li class='list-gpfrm-list'>No found data matches Records</li>
        ";
    }
}

//echo "Query: " . $query . "<br />";;
// echo json_encode($response);
echo json_encode($results);

// echo $display_string;
}
?>