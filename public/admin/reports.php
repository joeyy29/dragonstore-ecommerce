<?php
session_start();
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header("Location: login.php");
    exit();
}

require_once('../../config/db.php');

// Fetch all orders with user information
$orders = $conn->query("
    SELECT o.id, u.username, o.total_price, o.created_at
    FROM orders o
    JOIN users u ON o.user_id = u.id
    ORDER BY o.created_at DESC
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Reports</title>
</head>
<body>
    <h2>View Reports</h2>
    <a href="dashboard.php">Back to Dashboard</a>

    <h3>All Orders</h3>
    <table border="1">
        <tr>
            <th>Order ID</th>
            <th>User</th>
            <th>Total Price</th>
            <th>Date</th>
        </tr>
        <?php if ($orders->num_rows > 0): ?>
            <?php while ($order = $orders->fetch_assoc()): ?>
            <tr>
                <td><?php echo $order['id']; ?></td>
                <td><?php echo $order['username']; ?></td>
                <td>$<?php echo number_format($order['total_price'], 2); ?></td>
                <td><?php echo $order['created_at']; ?></td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No orders found.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>