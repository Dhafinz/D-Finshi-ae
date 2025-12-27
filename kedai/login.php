<?php
session_start();
include '../config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        if ($user['role'] == 'admin') {
            header('Location: dashboard.php');
        } else {
            header('Location: ../index.php'); // User biasa kembali ke home
        }
    } else {
        echo "Login gagal!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - D'Finshi ae</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/layout.css">
</head>
<body>
    <header>
        <div class="logo">D'Finshi ae</div>
        <nav>
            <a href="index.php">Beranda</a>
        </nav>
    </header>
    
    <section class="login">
        <h1>Login</h1>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p>Belum punya akun? <a href="register.php">Daftar</a></p>
    </section>
    
    <footer>
        <p>&copy; 2023 D'Finshi ae. Jam Operasional: 09.00 - 17.00 Setiap Hari</p>
    </footer>
</body>
</html>