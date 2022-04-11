<?php
include('config.inc.php');
$productNameError = $productDescError = $productPriceError = $productPhotoError = $cIDError = ' ';
if(isset($_POST['register'])){
    $productName = $_POST['productName'];
    $productDesc = $_POST['productDesc'];
    $productPrice = $_POST['productPrice'];
    $productPhoto = $_POST['productPhoto'];
    $cID = $_POST['categoryID'];

    if (empty($productName)){
        $productNameError = "Product Name can't be blank.";
        $error = true;
    }
    if (empty($productDesc)){
        $productDescError = "Product Description can't be blank.";
        $error = true;
    }
    if(empty($productPrice)){
        $productPriceError = "Product Price can't be blank.";
        $error = true;
    }

    if(empty($productPhoto)){
        $productPhotoError = "Product Photo Location can't be blank.";
        $error = true;
    }

    if(empty($cID)){
        $cIDError = "Category ID can't be blank.";
        $error = true;
    }

    if(!$error){
        $sql = "INSERT INTO products(productName, productDesc, productPrice, productPhoto, categoryID)VALUES('$productName', '$productDesc', '$productPrice', '$productPhoto', '$cID')";
        if (mysqli_query($conn, $sql)) {
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Data Inserted Successfully")';  
            echo '</script>';
            header("location: ../products.php");  
            
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
    <title>Add New Products</title>
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
                                <h1 class="h4 text-gray-900 mb-4">Add Product</h1>
                            </div>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" name="users" method="POST">
                                <div class="form-group">
                                    <input type="text" name="productName" placeholder="Product Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <textarea name="productDesc" id="productDesc" class="form-control" placeholder="Product Description"></textarea>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" name="productPrice" placeholder="Product Price" class="form-control">
                                    </div>
                                    <div class="col-sm-6">
                                    <select name="categories" id="categories" class="form-control">
                                        <option value="none" selected disabled hidden>Categories</option>
                                        <?php 
                                        $category = "SELECT * FROM categories;";
                                        if($result = $conn -> query($category)){
                                            if($result -> num_rows > 0){
                                                while($row = $result -> fetch_array()){
                                        ?>
                                            <option value="<?php echo $row['categoryName']?>"><?php echo $row['categoryName']?></option>
                                        <?php
                                                }
                                            }
                                        }
                                        ?></select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" name="productPhoto" placeholder="Product Photo" class="form-control">
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