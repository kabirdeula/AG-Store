<?php
include('config.inc.php');
$userNameError = $firstNameError = $lastNameError = $emailError = $passwordError = "";
if(isset($_POST['register'])){
    $userName = $_POST['userName'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $userPassword = $_POST['userPassword'];

    if (empty($userName)){
        $userNameError = "Username can't be blank.";
        $error = true;
    }
    if (empty($firstName)){
        $firstNameError = "First Name can't be blank.";
        $error = true;
    }
    if(empty($lastName)){
        $lastNameError = "Last Name can't be blank.";
        $error = true;
    }

    if(empty($email)){
        $emailError = "Email can't be blank.";
        $error = true;
    }

    if(empty($password)){
        $passwordError = "Password can't be blank.";
        $error = true;
    }

    if (!preg_match("/^[a-zA-Z ]+$/",$firstName)) {
        $firstNameError = "First name must contain only alphabets and space";
        $error = true;
    }

    if (!preg_match("/^[a-zA-Z ]+$/",$lastName)) {
        $lastNameError = "Last name must contain only alphabets and space";
        $error = true;
    }

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $emailError = "Please Enter Valid Email ID";
        $error = true;
    }

    if(strlen($password) < 6) {
        $passwordError = "Password must be minimum of 6 characters";
    }
    
    if(!$error){
        $sql = "INSERT INTO users(userName, firstName, lastName, email,userPassword)VALUES('$userName', '$firstName', '$lastName', '$email', '$userPassword')";
        if (mysqli_query($conn, $sql)) {
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Data Inserted Successfully")';  
            echo '</script>';
            header("location: login.php");  
            
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="AG Store is an ecommerce website or an online based business that sells handmade items and diy items." />
    <meta name="keywords" content="agstore, handmade, diy, ecommerce, kabirdeula, bijinamaharjan, aayushamaharjan" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="./admin/css/sb-admin-2.css">

</head>

<body class="bg-warning">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h3 font-weight-bold mb-4">SIGN UP</h1>
                            </div>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" name="contact" method="POST">
                                <div class="form-group">
                                    <input type="text" name="userName" placeholder="Username" class="form-control">
                                    <span class="text-danger"><?php echo $userNameError;?></span>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="firstName" placeholder="First Name" class="form-control">
                                        <span class="text-danger"><?php echo $firstNameError;?></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="lastName" placeholder="Last Name" class="form-control"> 
                                        <span class="text-danger"><?php echo $lastNameError;?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Email Address" class="form-control">
                                    <span class="text-danger"><?php echo $emailError;?></span>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="userPassword" placeholder="Password" class="form-control">
                                    <span class="text-danger"><?php echo $passwordError;?></span>
                                </div>
                                <input type="submit" class="btn btn-block btn-success" value="Sign Up" name="register">
                                <p class="py-3 initialism font-weight-bolder">
                                    Already have an account?
                                    <a href="login.php">Sign In</a>
                                </p>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5 d-none d-lg-block"><img src="./images/register.webp" alt="Person looking at the computer" class="img-fluid px-3 px-sm-4 mt-3 mb-4"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>