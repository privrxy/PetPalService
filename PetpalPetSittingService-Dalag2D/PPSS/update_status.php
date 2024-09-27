<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petpal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if id and status are set in the URL
if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE appointment SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Required parameters are missing";
}

$conn->close();

// Redirect back to the admin panel
header("Location: admin.php");
exit();
?>
