<?php
session_start();

// Enable error reporting para sa debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Kumonekta sa database
$conn = mysqli_connect('localhost', 'root', '', 'petpal');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Kunin ang data mula sa form
$id = mysqli_real_escape_string($conn, $_POST['id']);
$firstName = mysqli_real_escape_string($conn, $_POST['editFirstName']);
$lastName = mysqli_real_escape_string($conn, $_POST['editLastName']);
$middleName = mysqli_real_escape_string($conn, $_POST['editMiddleName']);
$email = mysqli_real_escape_string($conn, $_POST['editEmail']);
$contactNum = mysqli_real_escape_string($conn, $_POST['editContactNum']);
// $password = mysqli_real_escape_string($conn, $_POST['editPassword']); // Walang hash

// Debugging outputs
echo "ID: $id\n";
echo "First Name: $firstName\n";
echo "Last Name: $lastName\n";
echo "Middle Name: $middleName\n";
echo "Email: $email\n";
echo "Contact Number: $contactNum\n";
// echo "Password: $password\n";

// Update query
$sql = "UPDATE users SET firstName='$firstName', lastName='$lastName', middleName='$middleName', email='$email', contactNum='$contactNum' WHERE id='$id'";

// Execute the update statement
if ($conn->query($sql) === TRUE) {

    echo "<script>alert('Profile updated successfully');</script>";
    header("Location: user.php?id=" .$_SESSION['email']);
    
} else {
    echo "Error updating user: " . $conn->error;
}

// Isara ang koneksyon
$conn->close();
?>
