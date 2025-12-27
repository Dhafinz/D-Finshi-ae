<?php
include '../config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, 'user')");
    if ($stmt->execute([$username, $password])) {
        echo "Registrasi berhasil! <a href='login.php'>Login sekarang</a>";
    } else {
        echo "Username sudah ada!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - D'Finshi ae</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>
    <header>
        <div class="logo">D'Finshi ae</div>
        <nav>
            <a href="index.php">Beranda</a>
            <a href="login.php">Login</a>
        </nav>
    </header>
    
    <section class="register">
        <h1>Daftar Akun</h1>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Daftar</button>
        </form>
        <p>Sudah punya akun? <a href="login.php">Login</a></p>
    </section>
    
    <footer>
        <p>&copy; 2023 D'Finshi ae. Jam Operasional: 09.00 - 17.00 Setiap Hari</p>
    </footer>
</body>
</html>