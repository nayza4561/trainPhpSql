<?php 
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "delider";

    //create connection
    $conn = mysqli_connect($hostname, $username, $password, $database);

    //check connection
    if ($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
    }
?>