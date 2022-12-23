<?php
session_start();

require_once "./config.inc.php";


if(isset($_POST["Remove"])){
    foreach($_SESSION['cart'] as $key => $value){
        if($value["productName"] == $_POST["productName"]){
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }
}

?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="AG Store is an ecommerce website or an online based business that sells handmade items and diy items." />
    <meta name="keywords" content="agstore, handmade, diy, ecommerce, kabirdeula, bijinamaharjan, aayushamaharjan" />

    <!-- Animate.css -->
    <link rel="stylesheet" href="./css/animate.css">

    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="./css/icomoon.css">

    <!-- Bootstrap  -->
    <link rel="stylesheet" href="./css/bootstrap.css">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="./css/flexslider.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="./css/style.css">

    <!-- Modernizr JS -->
    <script src="./js/modernizr-2.6.2.min.js"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./images/favicon.png">

</head>

<body>

    <div class="fh5co-loader"></div>

    <div id="page">
        <nav class="fh5co-nav" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-xs-2">
                        <div id="fh5co-logo"><a href="index.php">AG Store</a></div>
                    </div>
                    <div class="col-md-6 col-xs-6 text-center menu-1">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="product.php">Shop</a></li>
                            <?php 
                            if($_SESSION['loggedIn']){
                                echo '<li>'. $_SESSION['userName']. '</li>';
                                echo '<li><a href="logout.php">Log Out</a></li>';
                            } else{
                                echo '<li><a href="login.php">Login</a></li>';
                            } ?>
                        </ul>
                    </div>
                    <div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
                        <ul>
                            <li class="search">
                                <div class="input-group">
                                    <input type="text" placeholder="Search..">
                                    <span class="input-group-btn">
										<button class="btn btn-primary" type="button"><i
												class="icon-search"></i></button>
									</span>
                                </div>
                            </li>
                            <li class="shopping-cart"><a href="./viewCart.php" class="cart"><span><small><?php echo count($_SESSION['cart']);?></small><i
											class="icon-shopping-cart"></i></span></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </nav>
        
        <div id="fh5co-about">
            <div class="container">
                <div class="about-content">
                    <div class="row">
                        <div class="col-md-8">
                            <form action="./viewCart.php" method="post">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        if(isset($_SESSION['cart'])){
                                            $productID = array_column($_SESSION['cart'],'productID');
                                            $sql = "SELECT * FROM products";
                                            $result = $conn -> query($sql);
                                            $i = 1;
                                            while($row = $result -> fetch_assoc()){
                                                foreach($productID as $ID){
                                                    if($row["productID"] == $ID){
                                                        $totalPrice = $totalPrice + (int)$row['productPrice'];
                                    ?>            
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td><?php echo $row['productName'];?></td>
                                            <td><?php echo $row['productPrice'];?></td>
                                            <td>
                                                <button type="button" class="icon-plus"></button>
                                                1
                                                <button type="button" class="icon-minus"></button>
                                            </td>
                                            <td>
                                                <button>Buy Now</button>
                                                <!-- <button name="Remove">Remove</button> -->
                                                <input type="submit" value="Remove" name="Remove">
                                                <input type="hidden" name="productID" value="<?php echo $productID;?>">
                                                <!-- <?php echo $test, $testID;?> -->
                                            </td>
                                        </tr>
                                    <?php
                                                    }
                                                }
                                            }
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </form>
                            
                        </div>
                        <div class="col-md-4">
                            <h1 class="h4 text-secondary">Total Price:</h1>
                            <p class="h2 price"><?php echo $totalPrice;?></p>
                        </div>
                    </div>
                        
                </div>
            </div>
        </div>

        <footer id="fh5co-footer" role="contentinfo">
            <div class="container">
                <div class="row row-pb-md">
                    <div class="col-md-4 fh5co-widget">
                        <h3>AG Store.</h3>
                        <p></p>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <ul class="fh5co-footer-links">
                            <li><a href="about.php">About</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="product.php">Shop</a></li>
                        </ul>
                    </div>
                </div>

                <div class="row copyright">
                    <div class="col-md-12 text-center">
                        <p><small class="block">&copy; 2020 - <?php echo date("Y")?> AG Store. All Rights Reserved.</small></p>
                        <p>
                            <ul class="fh5co-social-icons">
                                <li><a href="https://www.instagram.com/agstore315/"><i class="icon-instagram"></i></a></li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>

    <!-- jQuery -->
    <script defer src="js/jquery.min.js"></script>

    <!-- jQuery Easing -->
    <script defer src="js/jquery.easing.1.3.js"></script>

    <!-- Bootstrap -->
    <script defer src="js/bootstrap.min.js"></script>

    <!-- Waypoints -->
    <script defer src="js/jquery.waypoints.min.js"></script>

    <!-- Carousel -->
    <script defer src="js/owl.carousel.min.js"></script>

    <!-- countTo -->
    <script defer src="js/jquery.countTo.js"></script>

    <!-- Flexslider -->
    <script defer src="js/jquery.flexslider-min.js"></script>

    <!-- Main -->
    <script defer src="js/main.js"></script>

</body>

</html>