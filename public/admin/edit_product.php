<?php
session_start();
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header("Location: login.php");
    exit();
}

require_once('../../config/db.php');

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: products.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if (!$product) {
    header("Location: products.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "UPDATE products SET name = ?, description = ?, price = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdi", $name, $description, $price, $id);
    $stmt->execute();
    header("Location: products.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h2>Edit Product</h2>
    <a href="products.php">Back to Products</a>

    <form method="post">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
        <br>
        <label>Description:</label>
        <textarea name="description"><?php echo htmlspecialchars($product['description']); ?></textarea>
        <br>
        <label>Price:</label>
        <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required>
        <br>
        <button type="submit">Update Product</button>
    </form>
</body>
</html>