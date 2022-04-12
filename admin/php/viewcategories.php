<?php
include('config.inc.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Category</title>
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
                                    <h6 class="m-0 font-weight-bold text-primary text-center">Category</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if(isset($_GET["categoryID"]) && !empty(trim($_GET["categoryID"]))){
                                                    $ID = trim($_GET["categoryID"]);
                                                    $sql = "SELECT * FROM products P, categories C WHERE P.categoryID = C.categoryID AND C.categoryID = '$ID';";
                                                    if($result = $conn -> query($sql)){
                                                        if($result -> num_rows > 0){
                                                            while($row = $result -> fetch_array()){
                                                                echo '<tr>';
                                                                echo '<td>'. $row['productName'] .'</td>';
                                                                echo '<td>'. $row['productDesc'] .'</td>';
                                                                echo '<td>'. $row['productPrice'] .'</td>';
                                                                echo '</tr>';
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="../categories.php" class="btn btn-danger btn-block">Back</a>
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