<?php
include('config.inc.php');

if(isset($_POST["categoryID"]) && !empty($_POST["categoryID"])){
    $ID = $_POST["categoryID"];
    $categoryName = $_POST['categoryName'];
    $categoryType = $_POST['categoryType'];

    $update = "UPDATE categories SET categoryName = '$categoryName', categoryType = '$categoryType' WHERE categoryID = '$ID';";
    if(mysqli_query($conn, $update)){
        header("location: ../categories.php");
        exit();
    } else{
        echo "Error";
    }
    mysqli_close($conn);
}else{
    if(isset($_GET["categoryID"]) && !empty(trim($_GET["categoryID"]))){
        $ID = trim($_GET["categoryID"]);
// 
        $sql = "SELECT * FROM categories WHERE categoryID = '$ID'";
        if($result = $conn -> query($sql)){
            if($result -> num_rows == 1){
                $row = $result -> fetch_array(MYSQLI_ASSOC);
                $categoryName = $row["categoryName"];
                $categoryType = $row["categoryType"];
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
    <title>Update Category</title>
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
                                <h1 class="h4 text-gray-900 mb-4">Update Category</h1>
                            </div>
                            <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="POST">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input type="text" name="categoryName" value="<?php echo $categoryName;?>" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="categoryType" value="<?php echo $categoryType;?>" class="form-control">
                                    </div>
                                </div>
                                <input type="hidden" name="categoryID" value="<?php echo $ID; ?>">
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