<?php
session_start();
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Welcome, Admin!</h2>
    <p>This is the admin dashboard.</p>
    <ul>
        <li><a href="products.php">Manage Products</a></li>
        <li><a href="users.php">Manage Users</a></li>
        <li><a href="reports.php">View Reports</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>