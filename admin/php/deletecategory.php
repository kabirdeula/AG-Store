<?php

if(isset($_GET["categoryID"]) && !empty(trim($_GET["categoryID"]))){
    require_once "config.inc.php";

    $ID = $_GET["categoryID"];
    $sql = "DELETE FROM categories WHERE categoryID = '$ID'";

    if($result = $conn -> query($sql)){
        header("location: ../categories.php");
        exit();
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }
}
$conn -> close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Record</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Delete Record</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                        <div class="alert alert-danger">
                            <input type="hidden" name="categoryID" value="<?php echo trim($_GET["categoryID"]);?>">
                            <p>Are you sure you want to delete this record?</p>
                            <input type="submit" value="Yes" class="btn btn-danger">
                            <a href="../index.php" class="btn btn-secondary ml-2"></a>
                        </div>
                    </form>
                    <p><a href="../index.php" class="btn btn-primary">No</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>