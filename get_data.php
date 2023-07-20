<?php

$sample_data = array(

    array(
        "id" => 1,
        "name" => "krushna",
        "age" => 15
    ),
    array(
        "id" => 2,
        "name" => "furfur",
        "age" => 16
    ),
    array(
        "id" => 3,
        "name" => "manish",
        "age" => 18
    ),
    array(
        "id" => 4,
        "name" => "virat",
        "age" => 26
    ),
);

// $json_data = json_encode($sample_data);
// header('Content-Type: application/json');
// echo $json_data;


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

}

$servername = 'localhost';
$username = "root";
$password = "";
$dbname = "rest";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$q= "SELECT * FROM restData";
$result = $conn->query($q);


if($result->num_rows >0){
    $data =array();

    while($row = $result->fetch_assoc()){
        $data[]=$row;
    }

    $conn->close();


    header('Content-Type: application/json');
    echo json_encode($data);

}
else {
    echo "No data found.";
}

?>