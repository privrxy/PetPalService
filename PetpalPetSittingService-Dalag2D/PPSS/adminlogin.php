<?php

$servername = "localhost";
$username = "root";
$password = '';
$dbname = 'petpal';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$usernames = $_POST['username'];
$passwords = $_POST['password'];

$sql = "SELECT * FROM admin_acc WHERE username = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $usernames, $passwords);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
   
    header("location:admin.php");

} else {
    echo "Invalid username or password";
}

$stmt->close();
$conn->close();
?>