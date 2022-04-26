<?php
include('config.inc.php');

if(isset($_GET["productID"]) && !empty(trim($_GET["productID"]))){
    $ID = trim($_GET["productID"]);
    $sql = "SELECT * FROM products P, categories C WHERE P.categoryID = C.categoryID AND productID = '$ID'";
    if($result = $conn -> query($sql)){
        if($result -> num_rows == 1){
            $row = $result -> fetch_array(MYSQLI_ASSOC);
            $productName = $row["productName"];
            $productDesc = $row["productDesc"];
            $productPrice = $row["productPrice"];
            $productPhoto = $row["productPhoto"];
            $categoryName = $row["categoryName"];
            $productQty = $row["qty"];
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
    <title>View Product</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="../vendor/fontawesome-free/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">

    <link rel="stylesheet" href="../css/sb-admin-2.min.css">

</head>
<body>
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <div class="row m-5 p-5">
                        <div class="col-xl-12 col-lg-12 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-center">View Product</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="../../images/products/<?php echo $productPhoto;?>" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width:25rem;">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <h4 class="font-weight-bold text-secondary">Name</h4>
                                            <p><?php echo $productName?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h4 class="font-weight-bold text-secondary">Price</h4>
                                            <p>Rs. <?php echo $productPrice?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h4 class="font-weight-bold text-secondary">Description</h4>
                                            <p><?php echo $productDesc?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h4 class="font-weight-bold text-secondary">Quantity</h4>
                                            <p><?php echo $productQty?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h4 class="font-weight-bold text-secondary">Category</h4>
                                            <p><?php echo $categoryName;?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                    </div>
                                    <a href="../products.php" class="btn btn-danger btn-block">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>