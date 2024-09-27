<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petpal";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the id parameter from the URL
$id = $_GET['id'];

// Prepare the SQL query to delete the data
$sql = "DELETE FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

// Execute the query
if ($stmt->execute()) {
    header("location:admin.php");
} else {
    echo "Error deleting record: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>