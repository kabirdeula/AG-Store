<?php
include('config.inc.php');
if(isset($_POST['submit'])){
    $userName = $_POST['userName'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $userPassword = $_POST['userPassword'];
    
    $sql = "INSERT INTO users(userName, firstName, lastName, email,userPassword)VALUES('$userName', '$firstName', '$lastName', '$email', '$userPassword')";
    if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}

?>