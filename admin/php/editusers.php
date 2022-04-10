<?php
include('config.inc.php');

$userName = $firstName = $lastName = $email = $userPassword = "";
$userNameError = $firstNameError = $lastNameError = $emailError = $passwordError = "";

if(isset($_POST["uID"]) && !empty($_POST["uID"])){
    $ID = $_POST["uID"];
    $userName = $_POST['userName'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];

    $update = "UPDATE users SET userName = '$userName', firstName = '$firstName', lastName = '$lastName', email = '$email' WHERE uID = '$ID';";
    if(mysqli_query($conn, $update)){
        header("location: ../users.php");
        exit();
    } else{
        echo "Error";
    }
    mysqli_close($conn);
}else{
    if(isset($_GET["uID"]) && !empty(trim($_GET["uID"]))){
        $ID = trim($_GET["uID"]);
// 
        $sql = "SELECT * FROM users WHERE uID = '$ID'";
        if($result = $conn -> query($sql)){
            if($result -> num_rows == 1){
                $row = $result -> fetch_array(MYSQLI_ASSOC);
                $userName = $row["userName"];
                $firstName = $row["firstName"];
                $lastName = $row["lastName"];
                $email = $row["email"];
                $userPassword = $row["userPassword"];
                // 
            }else{
                header("location: error.php");
                exit();
            }
        }else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    $conn -> close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
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
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Update User</h1>
                            </div>
                            <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="POST" class="user">
                            <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="firstName" value="<?php echo $firstName;?>" class="form-control form-control-user">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="lastName" value="<?php echo $lastName; ?>" class="form-control form-control-user">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="userName" value="<?php echo $userName;?>" class="form-control form-control-user">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" value="<?php echo $email;?>" class="form-control form-control-user">
                                </div>
                                <input type="hidden" name="uID" value="<?php echo $ID; ?>">
                                <input type="submit" class="btn btn-success btn-block" value="Submit" name="register">
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>