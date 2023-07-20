<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON data from the request body
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);
    $servername = 'localhost';

    $username = "root";
    $password = "";
    $dbname = "rest";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $q= "UPDATE restData SET name=? ,email=? WHERE ID=?";

    $stmt = $conn->prepare($q);
    $stmt->bind_param("ssi" , $data['name'], $data["email"] ,$data["ID"]);

    if($stmt->execute()){
        echo "data updated  succesfully";
    }

    else{
        echo "error".$stmt->error;
    }



    // Decode the JSON data into an associative array

    // Process the data (for demonstration purposes, we'll just print it)
    $stmt->close();
    $conn->close();

    // You can now perform further operations, such as storing the data in a database
}
?>