<?php
// Database connection
$conn = new mysqli('localhost', 'root', 'root','teenzee_db');
//checking connection
if ($conn->connect_error) {
    die('Connection Failed' .$conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND role = ?");
    $stmt->bind_param("ss",$username, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])){
            echo "Login successfull Welcome, " . $user['username'];
        }
        else {
            echo "Incorrect password";
        }
    }
    else {
        echo "User not found !";
    }
    $stmt->close();
    $conn->close();
    }
?>
