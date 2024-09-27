<?php
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $middleName = $_POST['mName'];
    $eMail = $_POST['email'];
    $passWord = $_POST['password'];
    $contactNum = $_POST['contact_Num'];
    $addRess = $_POST['address'];

    $conn = new mysqli('localhost', 'root', '', 'petpal');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }else{
        $stmt = $conn->prepare("INSERT INTO users (firstName,lastName,middleName,email,password,contactNum,addRess) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssis",$firstName,$lastName,$middleName,$eMail,$passWord,$contactNum,$addRess);
        $stmt->execute();
        header("location:home.php");
        $stmt->close();
        $conn->close();
        
    }
?>
