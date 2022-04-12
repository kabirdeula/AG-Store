<?php
include('config.inc.php');
session_start();

$message = "";
$usernameError = "";
$passwordError = "";

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
        $adminSQL = "SELECT * FROM users WHERE userName='$username' AND userPassword='$password' AND userType='admin'";
        $adminResult = mysqli_query($conn, $adminSQL);
        $adminRow = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $adminCount = mysqli_num_rows($adminResult);
        
        if($adminCount == 1){
            $_SESSION['admin'] = $username;
            $_SESSION['adminlog'] = true;
            header("location: ./admin/index.php");
        }else if($count == 1){
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
    <link rel="stylesheet" href="./admin/css/sb-admin-2.css">
</head>
<body class="bg-info">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <img src="./images/favicon.png" alt="AG-Store" class="img-fluid px-3 px-sm-4 mt-3 mb-4">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h3 font-weight-bold mb-4">SIGN IN</h1>
                            </div>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" name="contact" method="POST">
                            <?php if($message){?>
                                <div class='alert alert-danger'><?php echo $message;?></div><?php }?>
                                <div class="form-group">
                                    <input type="text" placeholder="Username" name="userName" class="form-control">
                                    <span class="text-danger"><?php echo $usernameError;?></span>
                                </div>
                                <div class="form-group">
                                    <input type="password" placeholder="Password" name="userPassword" class="form-control">
                                    <span class="text-danger"><?php echo $passwordError;?></span>
                                </div>
                                <input type="submit" value="Sign In" name="submit" class="btn btn-block btn-success">
                                <div class="py-3 initialism font-weight-bolder">
                                    <p class="text-bold text-dark">
                                        Don't have an account?
                                        <a href="register.php" class="text-danger">Sign Up</a>
                                    </p>
                                    <p><a href="index.php" class="text-danger">Return to Home</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>