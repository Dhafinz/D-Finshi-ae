<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <nav>
        <a href="manage_products.php">Kelola Produk</a>
        <a href="manage_messages.php">Kelola Pesan</a>
        <a href="manage_users.php">Kelola User</a>
        <a href="logout.php">Logout</a>
    </nav>
    <h1>Dashboard Admin</h1>
</body>
</html>