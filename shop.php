
<div id="fh5co-product" class="product-screen-container">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <span>Cool Stuff</span>
                <h2>Products.</h2>
            </div>
        </div>
        <div class="row productList">
        <?php 
            $sql = "SELECT * FROM products;";
            if($result = $conn -> query($sql)){
                if($result -> num_rows > 0){
                    while($row = $result -> fetch_array()){?>
            <div class="col-md-4 text-center">
                <div class="product">
                    <div class="product-grid" style="background-image:url(./images/products/<?php echo $row['productPhoto']?>);">
                    </div>
                    <div class="desc">
                        <h3><?php echo '<a href="./single.php?productID='. $row['productID'].'">'.$row['productName'].'</a>';?></h3>
                        <span class="price">Rs. <?php echo $row['productPrice'];?></span>
                        <form method="post">
                            <button type="submit" class="btn btn-success" name="add">Add To Cart</button>
                            <input type="hidden" name="productID" value="<?php echo $row['productID'];?>">
                            <?php echo '<a href="./single.php?productID='. $row['productID'].'" class="icon"><i class="icon-eye"></i></a>';?>
                        </form>
                    </div>
                </div>
            </div>
        <?php 
                    }
                }
            }
        ?>
        </div>
    </div>
</div>