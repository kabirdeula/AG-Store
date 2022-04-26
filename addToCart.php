<?php
session_start();
require_once('config.inc.php');

$ID = $_GET["productID"];

$sql = "SELECT * FROM products where productID = '$ID'";
if ($result = $conn -> query($sql)){
    if ($result -> num_rows == 1){
        $row = $result -> fetch_array(MYSQLI_ASSOC);
        $productName = $row["productName"];
        $productPrice = $row["productPrice"];
        $productQty = $row["qty"]; 
        
        $product = array($productName, $productPrice, $productQty);

        $_SESSION[$productName] = $product;

        header('location: product.php');
    }
}

?>