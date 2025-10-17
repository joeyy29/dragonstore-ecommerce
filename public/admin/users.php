<?php
session_start();
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header("Location: login.php");
    exit();
}

require_once('../../config/db.php');

// Fetch all users
$users = $conn->query("SELECT id, username, is_admin FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
</head>
<body>
    <h2>Manage Users</h2>
    <a href="dashboard.php">Back to Dashboard</a>

    <h3>Existing Users</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Is Admin</th>
        </tr>
        <?php while ($user = $users->fetch_assoc()): ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['is_admin'] ? 'Yes' : 'No'; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>