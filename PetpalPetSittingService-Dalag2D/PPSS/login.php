<?php
session_start();
$servername = "localhost";
$username = "root";
$password = '';
$dbname = 'petpal';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$emails = $_POST['email'];
$passwords = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $emails, $passwords);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    $_SESSION['email'] = $user['email'];
    
    echo "<script>alert('New record created successfully');</script>";
    header("Location: user.php?id=" . $user['email']);
    exit(); // It's a good practice to call exit after a header redirect
} else {
    echo "Invalid username or password";
}

$stmt->close();
$conn->close();
?>
