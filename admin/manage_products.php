<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
}
include '../config.php';

// Tambah/Edit Produk
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    if (isset($_POST['id'])) {
        $stmt = $pdo->prepare("UPDATE products SET name=?, description=?, price=?, image=? WHERE id=?");
        $stmt->execute([$name, $description, $price, $image, $_POST['id']]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $description, $price, $image]);
    }
}

// Hapus Produk
if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM products WHERE id=?");
    $stmt->execute([$_GET['delete']]);
}

$products = $pdo->query("SELECT * FROM products")->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Kelola Produk</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <a href="dashboard.php">Kembali</a>
    <h1>Kelola Produk</h1>
    <form method="POST">
        <input type="text" name="name" placeholder="Nama Produk" required>
        <textarea name="description" placeholder="Deskripsi"></textarea>
        <input type="number" name="price" placeholder="Harga" required>
        <input type="text" name="image" placeholder="Path Gambar">
        <button type="submit">Tambah</button>
    </form>
    <table>
        <tr><th>Nama</th><th>Harga</th><th>Aksi</th></tr>
        <?php foreach ($products as $p): ?>
            <tr>
                <td><?php echo $p['name']; ?></td>
                <td><?php echo $p['price']; ?></td>
                <td><a href="?edit=<?php echo $p['id']; ?>">Edit</a> | <a href="?delete=<?php echo $p['id']; ?>">Hapus</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>