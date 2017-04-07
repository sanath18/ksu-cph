<?php
$servername = "131.123.40.146";
$username = "parkapps";
$password = "HmsseT04";
$dbname = "health";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>