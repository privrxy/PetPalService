<?php
// fetch_user.php
$conn = mysqli_connect('localhost', 'root', '', 'petpal');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT id, firstName, lastName, middleName, email, contactNum FROM users WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo "User not found";
}

$conn->close();
?>
