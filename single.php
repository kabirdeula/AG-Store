<?php
session_start();
require 'config.inc.php';

?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $row['productName'];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="AG Store is an ecommerce website or an online based business that sells handmade items and diy items.">
    <meta name="keywords" content="agstore, handmade, diy, ecommerce, kabirdeula, bijinamaharjan, aayushamaharjan">

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
    <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon">

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
                                echo '<li>'. $_SESSION['userName'].'</li>';
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
										<button class="btn btn-primary" type="button"><i class="icon-search"></i></button>
									</span>
                                </div>
                            </li>
                            <li class="shopping-cart">
                                <a href="#" class="cart"><span><small>0</small><i class="icon-shopping-cart"></i></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <?php
            $ID = $_GET['productID'];
            $title = "";
            $sql = "SELECT * FROM products WHERE productID = '$ID';";
            if($result = $conn -> query($sql)){
                if($result -> num_rows == 1){
                   $row = $result -> fetch_array(MYSQLI_ASSOC);
        ?>
        <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(./images/<?php echo $row['productPhoto'];?>);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="display-t">
                            <div class="display-tc animate-box" data-animate-effect="fadeIn">
                                <h1>Product Details</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div id="fh5co-product">
            <div class="container">
                <div class="row animate-box">
                    <div class="product col-md-4">
                        <div class="product-grid" style="background-image: url(./images/<?php echo $row['productPhoto'];?>);"></div>
                    </div>
                    <div class="product col-md-8 text-center fh5co-heading">
                        <h2><?php echo $row['productName'];?></h2>
                        <p><?php echo $row['productDesc'];?></p>
                        <p>
                            <a href="#" class="btn btn-primary btn-outline btn-lg">Add to Cart</a>
                            <a href="#" class="btn btn-primary btn-outline btn-lg">MRP: Rs. <?php echo $row['productPrice'];?></a>
                        </p>
                    </div>
                </div>
                            <?php
                                    }
                                }
                            ?>
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
                        <p><small class="block">&copy; 2020 - 2022 AG Store. All Rights Reserved.</small></p>
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