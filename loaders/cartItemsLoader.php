<?php
session_start();
                        
include "../includes/database.php";

$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();

// Define a fixed delivery fee
$delivery_fee = 100.00;

// Initialize running totals
$running_item_subtotal = 0.00; // This will hold the price of items *after* discounts 
$discounted = 0.00;
$before_discount = 0.00;
$per = 0;

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?')); // (?,?,?,? ...) for the sql query
    $stmt = $connect->prepare('SELECT * FROM product WHERE ProductID IN (' . $array_to_question_marks . ')');

    $stmt->execute(array_keys($products_in_cart));

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($products as $product) {
        $ID = $product['ProductID'];
        $quantity = (int)$products_in_cart[$ID];
        
        // calculating the subtotal price / discount
        $before_discount += $product['OldPrice'] * $quantity;
        
        if ($product['SpecialPrice'] != 0) {
            $running_item_subtotal += $product['SpecialPrice'] * $quantity;
            $discounted += $product['Discount'] * $quantity;
        } else {
            $running_item_subtotal += $product['OldPrice'] * $quantity;
        }
?>
        <!-- displaying product items in cart -->
        <div class="cart-item">
        <div class="left-cart-item">
            <div><img src="<?php echo $product['ImageURL'] ?>" width="100dvw" height="100dvh"></div>
            <div class="cart-item-info">
                <h2><?php echo $product['ProductName']?></h2>
                <h2><?php echo ($product['SpecialPrice']!=0)?$product['SpecialPrice']:  $product['OldPrice']?> ZAR</h2>
            </div>
        </div>
        <div class="right-cart-item">
            <div class="cart-quantity">
                <button onclick='decreaseQuantity("qt")'>-</button>
                <div id="qt"><?php echo $products_in_cart[$ID] ?> </div>
                <button onclick='increaseQuantity("qt")'>+</button>
                <script src="../assets/js/script2.js"></script>
            </div>
            
            <form method="post" action="../config/deleteCartItem.php">
                <input type='hidden' name='productID' value="<?php echo $ID ?>">
                <input type='image' src='../assets/images/trash.svg' alt='Delete' width="30px" height="30px" style="border:none;cursor:pointer;margin-right:20px;">
                
            </form>
            
        </div>
        </div>
<?php } 

// Final Calculation Steps:
// 1. Calculate the discount percentage
$per = ($before_discount > 0) ? ($discounted / $before_discount) * 100 : 0;

// 2. Calculate the final total (Item Subtotal - Discount + Delivery Fee)
$subtotal = $running_item_subtotal + $delivery_fee; 

// 3. Update Session variables
$_SESSION['total-bd'] = $before_discount;
$_SESSION['ds'] = $discounted;
$_SESSION['per'] = $per;
$_SESSION['total'] = $subtotal; // This now holds the correct final total

} else {
    // If cart is empty, set subtotal to 0 and display message
    $subtotal = 0.00;
    echo "<h1>Cart Empty</h1>";
} 
?>


