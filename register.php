<?php
include('config.inc.php');
$userNameError = "Username";
$firstNameError = "First Name";
$lastNameError = "Last Name";
$emailError = "Email Address";
$passwordError = "Password";
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
    <link rel="stylesheet" href="style.css">
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="AG Store is an ecommerce website or an online based business that sells handmade items and diy items." />
    <meta name="keywords" content="agstore, handmade, diy, ecommerce, kabirdeula, bijinamaharjan, aayushamaharjan" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon">

</head>

<body>
    <section>
        <div class="main-container">
            <div class="user signIn-box">
                <div class="imgBox">
                    <img src="./images/register.webp" alt="Man using Desktop Computer" id="imgBox" />
                </div>
                <div class="formBox">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" name="contact" method="POST">
                        <h2 id="h2-signin-up">Create An Account!</h2>
                        <input type="text" name="userName" placeholder="<?php echo $userNameError ?>">
                        <input type="text" name="firstName" placeholder="<?php echo $firstNameError ?>">
                        <input type="text" name="lastName" placeholder="<?php echo $lastNameError ?>">
                        <input type="email" name="email" placeholder="<?php echo $emailError ?>">
                        <input type="password" name="userPassword" placeholder="<?php echo $passwordError ?>">
                        <input type="submit" class="btn-signUp" value="Sign Up" name="register">
                        <p class="signUp">
                            Already have an account?
                            <a href="login.php">Sign In</a>
                        </p>
                    </form>
                </div>
            </div>

            
        </div>
    </section>
</body>

</html>