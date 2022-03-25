<?php

session_start();
$message = "";
if(count($_POST)>0){
    include('config.inc.php');

    $username = $_POST['userName'];
    $password = $_POST['userPassword'];

    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT userName, userPassword FROM users WHERE userName='$username' AND userPassword='$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if(is_array($row)){
        $_SESSION["uID"] = $row['uID'];
        $_SESSION["firstName"] = $row['firstName'];
    }else{
        $message = "Invalid Username or Password";
    }
}
    if(isset($_SESSION["uID"])){
        header("Location:index.php");
    }
    // if($count == 1){
    //     echo 'Login Successfull';
    // }else{
    //     echo 'Login failed.';
    // }

?>