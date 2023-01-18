<?php
//require 'flight/Flight.php';
//require 'includes/flight-master/flight/Flight.php';
//require 'includes/pdo.php';
//
//// Connect to database
//$conn = new mysqli('host', 'username', 'password', 'database');
//
//// Middleware to check for valid token
//Flight::before('start', function(&$params, &$output){
//    $headers = apache_request_headers();
//    if(isset($headers['Authorization'])){
//        $token = $headers['Authorization'];
//        $query = "SELECT * FROM users WHERE token='$token'";
//        $result = $conn->query($query);
//        if($result->num_rows > 0){
//            return;
//        }
//    }
//    Flight::halt(401, 'Unauthorized');
//});
//
//// Route to get data from database
//Flight::route('GET /data', function(){
//    $query = "SELECT * FROM data";
//    $result = $conn->query($query);
//    $data = array();
//    while($row = $result->fetch_assoc()){
//        $data[] = $row;
//    }
//    return json_encode($data);
//});
//
//// Start the application
//Flight::start();
