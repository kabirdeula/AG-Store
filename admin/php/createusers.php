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
            header("location: ../users.php");  
            
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
    <title>Create New User</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="../vendor/fontawesome-free/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">

    <link rel="stylesheet" href="../css/sb-admin-2.min.css">

</head>

<body class="bg-gradient-warning">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create User</h1>
                            </div>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" name="users" method="POST" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="firstName" placeholder="<?php echo $firstNameError ?>" class="form-control form-control-user">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="lastName" placeholder="<?php echo $lastNameError ?>" class="form-control form-control-user">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="userName" placeholder="<?php echo $userNameError ?>" class="form-control form-control-user">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="<?php echo $emailError ?>" class="form-control form-control-user">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="userPassword" placeholder="<?php echo $passwordError ?>" class="form-control form-control-user">
                                </div>
                                <input type="submit" class="btn btn-success btn-block" value="Submit" name="register">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>