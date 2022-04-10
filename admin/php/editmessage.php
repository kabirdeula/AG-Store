<?php
include('config.inc.php');

if(isset($_POST["mID"]) && !empty($_POST["mID"])){
    $ID = $_POST["mID"];
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $subText = $_POST['subText'];
    $messageField = $_POST['messageField'];

    $update = "UPDATE messageBox SET fName = '$fName', lName = '$lName', email = '$email', subText = '$subText', messageField = '$messageField' WHERE mID = '$ID';";
    if(mysqli_query($conn, $update)){
        header("location: ../messages.php");
        exit();
    } else{
        echo "Error";
    }
    mysqli_close($conn);
}else{
    if(isset($_GET["mID"]) && !empty(trim($_GET["mID"]))){
        $ID = trim($_GET["mID"]);
// 
        $sql = "SELECT * FROM messageBox WHERE mID = '$ID'";
        if($result = $conn -> query($sql)){
            if($result -> num_rows == 1){
                $row = $result -> fetch_array(MYSQLI_ASSOC);
                $fName = $row["fName"];
                $lName = $row["lName"];
                $email = $row["email"];
                $subText = $row["subText"];
                $messageField = $row["messageField"];
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
    <title>Update Message</title>
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
                                <h1 class="h4 text-gray-900 mb-4">Update Message</h1>
                            </div>
                            <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="POST">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input type="text" name="fName" value="<?php echo $fName;?>" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="lName" value="<?php echo $lName;?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" value="<?php echo $email; ?>" class="form-control form-control-user">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subText" value="<?php echo $subText;?>" class="form-control form-control-user">
                                </div>
                                <div class="form-group">
                                    <textarea name="messageField" id="lName" cols="10" rows="5" class="form-control"><?php echo $messageField;?></textarea>
                                </div>
                                
                                <input type="hidden" name="mID" value="<?php echo $ID; ?>">
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