<!DOCTYPE html>
<html>
<head>
<style>

table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
print "pöö";
/*$q = intval($_GET['q']);

$con = mysqli_connect('localhost','admin','Q2werty1234','autometa');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"autometa");
$sql="SELECT * FROM haku WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);
print "pöö";

echo "<table>
<tr>
<th>keyword</th>
<th>picture_id</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['keyword'] . "</td>";
    echo "<td>" . $row['picture_id'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
*/
?>
</body>
</html> 