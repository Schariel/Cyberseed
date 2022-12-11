<?php

//This code is meant to recieve a POST from the device with sensor data so that it can be inserted into the data base
//he request will be validated with a secret key that only the device knows

//session and connection obj
include_once "../php/functions.php";

//security key to prevent non device from posting into the database
$api_key_value = "draz1rahc";

$api_key= $devicekey = $soilhumidity = $humidity = $temperature = $lux = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        //extracks sensor and device information from URL
        $devicekey = test_input($_POST["devicekey"]);
        $soilhumidity = test_input($_POST["soilhumidity"]);
        $humidity = test_input($_POST["humidity"]);
        $temperature = test_input($_POST["temperature"]);
        $lux = test_input($_POST["lux"]);
      
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        //inserts data into the database
        $sql = "INSERT INTO entries (devicekey, soilhumidity, humidity, temperature, lux)
        VALUES ('$devicekey', '$soilhumidity', '$humidity', '$temperature', '$lux');";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

//helps process data from http POST
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>