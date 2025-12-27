<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
}
include '../config.php';

// Tambah/Edit User
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    if (isset($_POST['id'])) {
        $stmt = $pdo->prepare("UPDATE users SET username=?, password=?, role=? WHERE id=?");
        $stmt->execute([$username, $password, $role, $_POST['id']]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        $stmt->execute([$username, $password, $role]);
    }
}

// Hapus User
if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM users WHERE id=?");
    $stmt->execute([$_GET['delete']]);
}

$users = $pdo->query("SELECT * FROM users")->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Kelola User</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <a href="dashboard.php">Kembali</a>
    <h1>Kelola User/Admin</h1>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <select name="role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        <button type="submit">Tambah</button>
    </form>
    <table>
        <tr><th>Username</th><th>Role</th><th>Aksi</th></tr>
        <?php foreach ($users as $u): ?>
            <tr>
                <td><?php echo $u['username']; ?></td>
                <td><?php echo $u['role']; ?></td>
                <td><a href="?edit=<?php echo $u['id']; ?>">Edit</a> | <a href="?delete=<?php echo $u['id']; ?>">Hapus</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>