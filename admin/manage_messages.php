<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
}
include '../config.php';

// Hapus pesan
if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM messages WHERE id=?");
    $stmt->execute([$_GET['delete']]);
}

$messages = $pdo->query("SELECT * FROM messages ORDER BY created_at DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Kelola Pesan</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <a href="dashboard.php">Kembali</a>
    <h1>Pesan dari Form Kontak</h1>
    <table>
        <tr><th>Nama</th><th>Email</th><th>Pesan</th><th>Tanggal</th><th>Aksi</th></tr>
        <?php foreach ($messages as $msg): ?>
            <tr>
                <td><?php echo $msg['name']; ?></td>
                <td><?php echo $msg['email']; ?></td>
                <td><?php echo substr($msg['message'], 0, 50) . '...'; ?></td>
                <td><?php echo $msg['created_at']; ?></td>
                <td><a href="?delete=<?php echo $msg['id']; ?>">Hapus</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>