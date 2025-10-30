<?php session_start() ;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DragonStone</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/images/logo.png" type="image/icon type">
    <script src="assets/js/scripts.js"></script>
    
</head>
<body>
    <!-- Header -->
    <header>
        <div class="left">
            <nav>
                <ul>
                    <li><a href="homePage.php">Home</a></li>
                    <li><a href="pages/shopPage.php">Shop</a></li>
                    <li><a href="pages/brandsPage.php">Brands</a></li>
                </ul>
            </nav>
        </div>
        <div class="icons">
            <div class="icon"><a href="config/login.php"><img src="assets/images/profile.svg" height="25px"/></a></div>
            <div class="icon"><a href="pages/cartPage.php"><img src="assets/images/cart.svg" height="25px"/></a></div>
        </div>
    </header>
    <!-- ---------------------------------------------------------------------------------------------------- -->

    <!-- Hero section -->
    <section class="hero-section">
        <div class="hero-left">
            <h1 class="hero-text">ALL YOU NEED <br>TO BUILD<br>YOUR PERFECT<br> SPACE</h1>
            <button class="shop-btn"><a href="pages/shopPage.php">Shop Now</a></button>
        </div>
    </section>
    <!-- ------------------------------------------------------------------------------------------------------------------- -->
    
    <!-- Stats Section -->
    <section class="stats-section">
            <div>
                <p><span class="numbers" id="counter1"></span><span class="desc-number"><br>International Brands</span></p>
            </div>
            <div class="mid">
                <p><span class="numbers" id="counter2"></span><span class="desc-number"><br>High-Quality Products</span></p>
            </div>
            <div>
                <p><span class="numbers" id="counter3"></span><span class="desc-number"><br>Happy Customers</span></p>
            </div>
    </section>
    <!-- ---------------------------------------------------------------------------------------------- -->
    
    
    <!-- brands Section -->
    <section class="brands-section">
        <div class="br1">
          
           
            <div class="brand"><img src="assets/images/logo.png"/></div>
         
        </div>
    </section>
    <!-- ------------------------------------------------------------------------------------------------------- -->
    


    
    <!-- ------------------------------------------------------------------------------------------------------- -->
    
    
    <!-- Most selled Products section -->
    <section class="container">
        <div class="title">
            <h1 class="title-text">MOST SELLED PRODUCTS</h1>
        </div>
        <div class="products-list">
            <ul>
                <?php 
                    require_once "includes/database.php" ;

                    $quer = "SELECT * FROM product WHERE ProductID IN (4,18,80,150,76)";
                    $stm = $connect->query($quer) ;
                    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach($result as $row) { $url = $row["ImageURL"] ;?>
                        <!-- displaying product card -->
                        <li><a href="pages/productDetailPage.php?ID=<?php echo"$row[ProductID]"?>" >
                        <div class="product-item">
                            <div><img src="<?php echo $url ?>" alt="product" class="prd-img"/></div>
                            <p class="pr-name"><?php echo $row["ProductName"] ?></p>
                            <img src="assets/images/rating.svg" alt="rating">
                            <p class="pr-price"><?php echo $row["OldPrice"] ?> DT</p>  
                        </div>
                        </a></li>
                    
                    <?php } ?>
                
                
            </ul>
        </div>

        <div class="btn-div">
            <button class="btn"><a href="">View All</a></button>
        </div>
    </section>
    <!-- ------------------------------------------------------------------------------------------------------------ -->
    <!-- Feedbacks section -->
    <hr style="width: 90%;">
    <section class="container">
        <div class="title">
            <h1 class="title-text">OUR HAPPY COSTUMERS</h1>
        </div>
        <div class="Feedbacks">
            <ul>
                <li>
                <div class="feedback">
                    <div><img src="assets/images/rating.png" alt="rating"/></div>
                    <div style="display: flex;align-items: center;">
                        <h3>Tariro Ngundu</h3>
                        <img src="assets/images/check.svg" alt="" height="20px"/>
                    </div>
                    <p>"As someone new to online shopping, I was a bit intimidated by the process at first. However, this website made it incredibly simple. The user-friendly layout, and the helpful recommendations, gave me the confidence to select the right products for my baby.”</p>
                </div>
                </li>
                <li><div class="feedback">
                    <div><img src="assets/images/rating.png" alt="rating"/></div>
                    <div style="display: flex;align-items: center;">
                        <h3>Zandile Ndhlovu</h3>
                        <img src="assets/images/check.svg" alt="" height="20px"/>
                    </div>
                    <p>"Shopping has never been easier! With a vast selection of high-quality products and seamless navigation, I was able to find everything I needed to design my dream home, from the kitchen area all the way to outdoor bits and bobs."</p>
                </div>
                </li>
                <li>
                <div class="feedback">
                    <div><img src="assets/images/rating.png" alt="rating"/></div>
                    <div style="display: flex;align-items: center;">
                        <h3>Tanatswa Mombe</h3>
                        <img src="assets/images/check.svg" alt="" height="20px"/>
                    </div>
                    <p>"I've been a loyal customer of DragonStone, and for good reason. Not only do they offer an extensive range of organic home decor items, but they have the best pet grooming products as well.”</p>
                </div>
                </li>
            </ul>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-item">
                <img src="assets/images/logo.png" alt="logo" />
                <p>Elevate your space with precision.<br> Discover top-tier eco-friendly items tailored<br> to your needs.Build your dream<br> space with DragonStone.</p>
        
            </div>
            <div class="footer-item">
                <p class="title">Company</p>
                <ul>
                    <li>About</li>
                    <li>Features</li>
                    <li>Works</li>
                    <li>Career</li>
                </ul>
            </div>
            <div class="footer-item">
                <p class="title">Help</p>
                <ul>
                    <li>Costumer Support</li>
                    <li>Delivery Details</li>
                    <li>Terms & Conditions</li>
                    <li>Privacy Policy</li>
                </ul>
            </div>
            <div class="footer-item">
                <p class="title">FAQ</p>
                <ul>
                    <li>Account</li>
                    <li>Manage Deliveries</li>
                    <li>Orders</li>
                    <li>Payments</li>
                </ul>
            </div>
        </div>
        <hr style="width: 90%;">
        <div class="flex-items">
            <p class="copyrights" >Shop.co © 2025, All Rights Reserved</p>
            <div class="flex">
                <img src="assets/images/visa.svg" alt="visa"/>
            </div> 
        </div>
    </footer>

</body>
</html>