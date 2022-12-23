<?php
include('config.inc.php');
$productNameError = $productDescError = $productPriceError = $productPhotoError = $cIDError = $qtyError = ' ';
$sql = "SELECT * FROM categories";
$allCategory = mysqli_query($conn, $sql);

if(isset($_POST['register'])){
    $productName = $_POST['productName'];
    $productDesc = $_POST['productDesc'];
    $productPrice = $_POST['productPrice'];
    $productPhoto = $_POST['productPhoto'];
    $productQty = $_POST['productQty'];
    $cID = $_POST['categoryID'];
    $target_file = "/srv/http/AG-Store/images/products/";
    $productPhoto = $_FILES['productPhoto']['name'];
    $file_type = $_FILES['productPhoto']['type'];
    $file_size = $_FILES['productPhoto']['size'];
    $file_temp = $_FILES['productPhoto']['tmp_name'];

    move_uploaded_file($file_temp,$target_file.$file_name);

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
        $productPhotoError = "Product Photo can't be blank.";
        $error = true;
    }

    if(empty($productQty)){
        $productQty = "Product Quantity can't be blank.";
        $error = true;
    }

    if(empty($cID)){
        $cIDError = "Category ID can't be blank.";
        $error = true;
    }

    if(!$error){
        $sqlInsert = "INSERT INTO products(productName, productDesc, productPrice, productPhoto, categoryID, qty)VALUES('$productName', '$productDesc', '$productPrice', '$productPhoto', '$cID', '$productQty')";
        if (mysqli_query($conn, $sqlInsert)) {
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Data Inserted Successfully")';  
            echo '</script>';
            header("location: ../products.php");  
            
        } else {
            echo "Error: " . $sqlInsert . ":-" . mysqli_error($conn);
        }
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
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" name="users" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" name="productName" placeholder="Product Name" class="form-control">
                                    <span class="text-danger"><?php echo $productNameError?></span>
                                </div>
                                <div class="form-group">
                                    <textarea name="productDesc" id="productDesc" class="form-control" placeholder="Product Description"></textarea>
                                    <span class="text-danger"><?php echo $productDescError?></span>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-8 mb-3 mb-sm-0 custom-file">
                                        <label for="productUpload" class="custom-file-label form-control">Upload Product Image</label>
                                        <input type="file" name="productPhoto" id="image" class="custom-file-input">
                                        <span class="text-danger"><?php echo $productPhotoError?></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="number" name="productPrice" placeholder="Product Price" class="form-control">
                                        <span class="text-danger"><?php echo $productPriceError?></span>
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-8 mb-3 mb-sm-0">
                                        <select name="categoryID" id="categoryID" class="form-control">
                                            <option disabled selected hidden>Category Name</option>
                                            <?php
                                                while($row = mysqli_fetch_array($allCategory, MYSQLI_ASSOC)){?>
                                                    <option value="<?php echo $row["categoryID"]?>"><?php echo $row["categoryName"]?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>
                                        <span class="text-danger"><?php echo $cIDError?></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="number" name="productQty" id="productQty" class="form-control" placeholder="Quantity">
                                    </div>
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
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
</html>