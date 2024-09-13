<?php
//Database connection
$conn = new mysqli('localhost', 'root', 'root', 'teenzee_db');

if ($conn->connect_error) {
    die('Connection Failed: '.$conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username =$_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    //Prepare and bing
    $stmt = $conn->prepare("INSERT INTO USER (username, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $password, $role);

    if ($stmt->execute()) {
        echo "Signup successful ! You can now login.";
    }
    else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
