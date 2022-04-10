<?php

session_start();
// include('config.inc.php');
// if(isset($_POST["addToCart"])){
//     if(isset($_SESSION["shoppingCart"])){
//         $itemArrayID = array_column($_SESSION["shoppingCart"], "itemID");
//         if(!in_array($_GET["id"], $itemArrayID)){
//             $count = count($_SESSION["shoppingCart"]);
//             $itemArray = array(
//                 'itemID' => $_GET["id"],
//                 'itemName' => $_POST["hiddenName"],
//                 'itemPrice' => $_POST["hiddenPrice"],
//                 'itemQuantity' => $_POST["quantity"]
//             );
//             $_SESSION["shoppingCart"][$count] = $itemArray;
//         }else{
//             echo '<script>alert("Item already added")</script>';
//         }
//     }else{
//         $itemArray = array(
//             'itemID' => $_GET["id"],
//             'itemName' => $_POST["hiddenName"],
//             'itemPrice' => $_POST["hiddenPrice"],
//             'itemQuantity' => $_POST["quantity"]
//         );
//         $_SESSION["shoppingCart"][0] = $itemArray;
//     }
// }

// if(isset($_GET["action"]))
// {
// 	if($_GET["action"] == "delete")
// 	{
// 		foreach($_SESSION["shoppingCart"] as $keys => $values)
// 		{
// 			if($values["itemID"] == $_GET["id"])
// 			{
// 				unset($_SESSION["shoppingCart"][$keys]);
// 				echo '<script>alert("Item Removed")</script>';
// 				echo '<script>window.location="addToCart.php"</script>';
// 			}
// 		}
// 	}
// }

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Cart</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
		<br />
		<div class="container">
			<br />
			<?php
				$query = "SELECT * FROM products ORDER BY productID ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-4">
				<form method="post" action="addToCart.php?action=add&id=<?php echo $row["productID"]; ?>">
					<div style="border:3px solid #5cb85c; background-color:whitesmoke; border-radius:5px; padding:16px;" align="center">
						<img src="images/<?php echo $row["productPhoto"]; ?>" class="img-responsive" /><br />

						<h4 class="text-info"><?php echo $row["productName"]; ?></h4>

						<h4 class="text-danger">$ <?php echo $row["productPrice"]; ?></h4>

						<input type="text" name="quantity" value="1" class="form-control" />

						<input type="hidden" name="hidden_name" value="<?php echo $row["productName"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["productPrice"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>
			<div class="table-responsive">
				
			</div>
		</div>
	</div>
	<br />
	</body>
</html>
