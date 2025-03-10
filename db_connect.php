<?php
$host = "localhost"; 
$dbname = "home_decor";
$username = "root"; 
$password = ""; 

// Create a database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Uncomment below to test the connection
// echo "Database connected successfully!";
?>
