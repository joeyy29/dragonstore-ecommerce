<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DragonStone</title>
        <link rel="stylesheet" href="../assets/css/style1.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="icon" href="../assets/images/logo.png" type="image/icon type">     
    </head>
    <body>
       <?php include "../includes/header.php" ?>
        <!--  -->
        <section class="container">
            <h1 class="cart-title">Your Cart</h1>
            <div class="cart-container">

                <!-- cart items -->
                <div class="cart-items">
                    <!-- show all products in cart -->
                    <?php include "../loaders/cartItemsLoader.php" ?>
                </div>

                <!-- cart summary  -->
                <div class="cart-summary">
                    <h2>Order Summary</h2>
                    <hr>
                    <div class="sum">
                        <h5>Subtotal</h5>
                        <h4><?php echo $before_discount ?> ZAR</h4>
                    </div>
                    <!-- FIX APPLIED HERE -->
                    <div class="sum">
                        <!-- Use a standard label like 'Discount' -->
                        <h5>Discount 
                            <!-- Display the percentage neatly, limited to two decimal places -->
                            <?php 
                                // Added number_format to fix the excessive decimals
                                $display_per = ($per > 100) ? 0 : number_format($per, 2);
                                echo "($display_per%)";
                            ?>
                        </h5>
                        <!-- Display the discounted amount clearly as a negative value -->
                        <div class="discount-price">-<?php echo number_format($discounted, 2) ?> ZAR</div>
                    </div>
                    <!-- END FIX -->
                    <div class="sum">
                        <h5>Delivery Fee</h5>
                        <h4 >100 ZAR</h4>
                    </div>
                    <hr>
                    <div class="sum">
                        <h5>Total</h5>
                        <h4><?php echo $subtotal ?> ZAR</h4>
                    </div>
                    <a href="<?php echo (isset($_SESSION['userFname']) && !empty($_SESSION['cart']) )? 'checkoutPage.php' : 'signinPage.php'; ?>">
                    <button class="filter-btn">Go to Chekout</button>
                    </a>
                </div>
            </div>
        </section>

        <?php include "../includes/footer.php" ?>
        
        
</body>
</html>
