<?php
// Database connection details
$severname = "mysql";
$username = "root"; 
$password = "root"
$dbname = "teenzeedb";

// Creating connection
$conn = new mysqli($severname, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die("Connection failed: ". &conn->connect_error);
}
echo "Connected sucessfully";
?>
