<?php
    session_start();

    $fullName = $_POST['ownerName'];
    $eMail = $_POST['ownerEmail'];
    $conTact = $_POST['ownerContactNum'];
    $namePet = $_POST['petName'];
    $typePet = $_POST['petType'];
    $daTe = $_POST['appointmentDate'];

    $conn = new mysqli('localhost', 'root', '', 'petpal');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }else{
        $stmt = $conn->prepare("INSERT INTO appointment (owners_name, email, contact, pet_name, pet_type, date) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisss",$fullName,$eMail,$conTact,$namePet,$typePet,$daTe);
        $stmt->execute();
        
        header("Location: user.php?id=" .$_SESSION['email']);

        $stmt->close();
        $conn->close();
        
    }
?>
