<?php
include('config.inc.php');

if(isset($_GET["uID"]) && !empty(trim($_GET["uID"]))){
    $ID = trim($_GET["uID"]);
    $sql = "SELECT * FROM users WHERE uID = '$ID'";
    if($result = $conn -> query($sql)){
        if($result -> num_rows == 1){
            $row = $result -> fetch_array(MYSQLI_ASSOC);
            $userName = $row["userName"];
            $firstName = $row["firstName"];
            $lastName = $row["lastName"];
            $email = $row["email"];
        }else{
                header("location: error.php");
                exit();
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
    <title>View Users</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="../vendor/fontawesome-free/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">

    <link rel="stylesheet" href="../css/sb-admin-2.min.css">

</head>
<body class="bg-gradient-secondary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg m-5">
            <div class="card-body p-0">
                <div class="text-center">
                        <h1 class="h4 text-gray-900 my-5">View User</h1>
                </div>
                <div class="row p-5">
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-bottom-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Name</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $firstName. ' '. $lastName;?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-bottom-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Username</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $userName;?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-bottom-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Email</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $email;?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="../users.php" class="btn btn-danger btn-block">Back</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>