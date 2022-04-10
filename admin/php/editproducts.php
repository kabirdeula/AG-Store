<?php
include('config.inc.php');

if(isset($_POST["productID"]) && !empty($_POST["productID"])){
    $ID = $_POST["productID"];
    $productName = $_POST['productName'];
    $productDesc = $_POST['productDesc'];
    $productPrice = $_POST['productPrice'];
    $productPhoto = $_POST['productPhoto'];

    $update = "UPDATE products SET productName = '$productName', productDesc = '$productDesc', productPrice = '$productPrice', productPhoto = '$productPhoto' WHERE productID = '$ID';";
    if(mysqli_query($conn, $update)){
        header("location: ../products.php");
        exit();
    } else{
        echo "Error";
    }
    mysqli_close($conn);
}else{
    if(isset($_GET["productID"]) && !empty(trim($_GET["productID"]))){
        $ID = trim($_GET["productID"]);
// 
        $sql = "SELECT * FROM products WHERE productID = '$ID'";
        if($result = $conn -> query($sql)){
            if($result -> num_rows == 1){
                $row = $result -> fetch_array(MYSQLI_ASSOC);
                $productName = $row["productName"];
                $productDesc = $row["productDesc"];
                $productPrice = $row["productPrice"];
                $productPhoto = $row["productPhoto"];
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
    <title>Update Product</title>
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
                                <h1 class="h4 text-gray-900 mb-4">Update Product</h1>
                            </div>
                            <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="POST" class="user">
                                <div class="form-group">
                                    <input type="text" name="productName" value="<?php echo $productName;?>" class="form-control form-control-user">
                                </div>
                                <div class="form-group">
                                    <textarea name="productDesc" id="productDesc" cols="10" rows="5" class="form-control"><?php echo $productDesc;?></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="productPhoto" value="<?php echo $productPhoto;?>" class="form-control form-control-user">
                                </div>
                                <div class="form-group">
                                    <input type="number" name="productPrice" value="<?php echo $productPrice; ?>" class="form-control form-control-user">
                                </div>
                                <input type="hidden" name="productID" value="<?php echo $ID; ?>">
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