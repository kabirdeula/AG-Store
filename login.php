<?php
include('config.inc.php');
session_start();

$message = "";
$usernameError = "Username";
$passwordError = "Password";

if(isset($_POST['submit'])){
    $username = $_POST['userName'];
    $password = $_POST['userPassword'];
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    if(empty($username)){
        $usernameError = "Username can't be blank.";
    }else if(isset($username) && isset($password)){
        $sql = "SELECT userName, userPassword FROM users WHERE userName='$username' AND userPassword='$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        
        if($count == 1){
            $_SESSION['userName'] = $username;
            $_SESSION['loggedIn'] = true;
            header("location: index.php");
        }else{
            $message = "Invalid Username or Password";
        }
    }
    if(empty($password)){
        $passwordError = "Password can't be blank.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="AG Store is an ecommerce website or an online based business that sells handmade items and diy items." />
    <meta name="keywords" content="agstore, handmade, diy, ecommerce, kabirdeula, bijinamaharjan, aayushamaharjan" />
    <title>Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon">
    
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <section>
        <div class="main-container">
            <div class="user signIn-box">
                <div class="imgBox">
                    <img src="./images/favicon.png" alt="" id="imgBox" />
                </div>
                <div class="formBox">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" name="contact" method="POST" data-netlify="true">
                    <?php echo "<h4 style='color: red; text-align: center;padding:25px;margin:5px;background:#d3d3d3;border-radius:20px;'>".$message?>
                        <h2 id="h2-signin-up">Sign In</h2>
                        <input id="form-ask" type="text" placeholder="<?php echo $usernameError?>" name="userName">
                        <input id="form-password" type="password" placeholder="<?php echo $passwordError ?>" name="userPassword">
                        <input type="submit" value="Sign In" name="submit">
                        <p class="signUp">
                            Don't have an account?
                            <a href="register.php">Sign Up</a>
                        </p>
                        <p class="signUp"><a href="index.php">Return to Home</a></p>
                    </form>
                </div>
            </div>
    
</body>
</html>