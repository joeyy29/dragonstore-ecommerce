<?php
session_start();
require_once('../config/db.php');

// In a real application, you would have a proper user login system for customers.
// For now, we will just show the checkout summary.


if (empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit();
}

$cart_items = [];
$total_price = 0;
if (!empty($_SESSION['cart'])) {
    $product_ids = implode(',', array_keys($_SESSION['cart']));
    $sql = "SELECT * FROM products WHERE id IN ($product_ids)";
    $result = $conn->query($sql);

    while ($product = $result->fetch_assoc()) {
        $quantity = $_SESSION['cart'][$product['id']];
        $cart_items[] = [
            'id' => $product['id'],
            'price' => $product['price'],
            'quantity' => $quantity
        ];
        $total_price += $product['price'] * $quantity;
    }
}

?>

<?php
$title = 'Checkout';
require_once('header.php');
?>

<h1>Checkout</h1>
<a href="cart.php">Back to Cart</a>
<hr>

<h3>Order Summary</h3>
<table>
    <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Subtotal</th>
    </tr>
    <?php
    $product_ids = implode(',', array_keys($_SESSION['cart']));
    $sql = "SELECT * FROM products WHERE id IN ($product_ids)";
    $result = $conn->query($sql);
    while ($product = $result->fetch_assoc()):
        $quantity = $_SESSION['cart'][$product['id']];
    ?>
    <tr>
        <td><?php echo htmlspecialchars($product['name']); ?></td>
        <td><?php echo $quantity; ?></td>
        <td>$<?php echo number_format($product['price'], 2); ?></td>
        <td>$<?php echo number_format($product['price'] * $quantity, 2); ?></td>
    </tr>
    <?php endwhile; ?>
    <tr>
        <td colspan="3"><b>Total</b></td>
        <td><b>$<?php echo number_format($total_price, 2); ?></b></td>
    </tr>
</table>


<?php require_once('footer.php'); ?>