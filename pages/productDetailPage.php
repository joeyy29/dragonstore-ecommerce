<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DragonStone</title>
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/style1.css">
        <link rel="icon" href="../assets/images/logo.png" type="image/icon type">
    </head>
    <body>
        <!-- Header -->
        <?php include "../includes/header.php" ?>
        <section class="pr-main container">
            <?php 
                include "../includes/database.php" ;
                session_start();

                if (isset($_GET["ID"]) && is_numeric($_GET['ID'])){
                    $id = htmlspecialchars($_GET['ID']);
                    
                    $sql = "SELECT * FROM product WHERE ProductID = ?";
                    $stm = $connect->prepare($sql);
                    $stm->execute([$id]);

                    
                    $product = $stm->fetch(PDO::FETCH_ASSOC);
                }
            ?>
            <div class="product-detail-img">
                <img src="<?php echo $product['ImageURL'] ?>" alt="">
            </div>
            <div class="product-info">
                <h1 class="pr-name"><?php echo $product['ProductName'] ?></h1>
                <div class="rate">
                    <img src="../assets/images/rating.svg" alt="" style="margin-right:30px;">
                    <div><?php echo $product['Rating']?></div>
                </div>

                <div class="pr-detail-price">
                    <?php
                    // Check if Special Price is available
                    if ($product['SpecialPrice']!=0){
                            echo "<div style='display:flex'>";
                            
                            // Special Price 
                            echo"<div class='price-d'>ZAR ".$product["SpecialPrice"]."</div>";
                            
                            // Old Price 
                            echo "<div class='price-bd'>ZAR ".$product['OldPrice']."</div>";
                            
                            // Discount 
                            echo"<div class='discount'><p>ZAR ".$product['Discount']."</p></div>" ;
                            echo "</div>";
                        } else {
                            // Only Old Price 
                            echo "<div class='price-d'>ZAR ".$product['OldPrice']."</div>";
                        }
                    
                    ?>
                </div>
                
                    <p class="product-description"><?php echo $product['Description'] ?></p>
                
                <hr>
                <div class="bot">
                    <div class="quantiy">
                        <button onclick="decreaseQuantity('Q') ;decreaseQuantity('realQ')">-</button>
                        <form action="../config/cartManagement.php" method='POST'>
                            <input type="text" id="Q" name="quantity" value="1" min="1" />
                            <input type="hidden" name="qua" value="1" min="1" />
                        </form>
                        <button onclick="increaseQuantity('Q') ;increaseQuantity('realQ')">+</button>
                    </div>
                    <form action="../config/cartManagement.php" method='POST'>
                        <input class="add-cart-btn" type="submit" name="add_to_cart" value="Add to Cart"/>
                        <input type="hidden" name='q' value="1" id="realQ">
                        <input type="hidden" name='productID' value="<?php echo $product['ProductID'] ?>">
                    </form>
                </div>
            </div>
        </section>
                        
        <?php 
            if (isset($_POST['quantity'])) echo "quantity set" ;
        ?>
        

        <?php include "../includes/footer.php" ?>
        <script
