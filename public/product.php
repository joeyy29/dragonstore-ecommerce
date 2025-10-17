<?php
session_start();
require_once('../config/db.php');

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if (!$product) {
    header("Location: index.php");
    exit();
}
?>

<?php
$title = htmlspecialchars($product['name']);
require_once('header.php');
?>

<a href="index.php">Back to Products</a>
<hr>

<h1><?php echo htmlspecialchars($product['name']); ?></h1>
<p><?php echo htmlspecialchars($product['description']); ?></p>
<p>Price: $<?php echo number_format($product['price'], 2); ?></p>

<form method="post" action="cart.php">
    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
    <label>Quantity:</label>
    <input type="number" name="quantity" value="1" min="1">
    <button type="submit" name="add_to_cart">Add to Cart</button>
</form>

<?php require_once('footer.php'); ?>