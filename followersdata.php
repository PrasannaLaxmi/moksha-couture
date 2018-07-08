<?php 
header('Contet-Type: application/json');
include 'inc/database.php';
$query = sprintf("SELECT months,userid,orders FROM months");


//execute query
$result = $conn->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
    $data[] = $row;
}



//now print the data
print json_encode($data);
?>