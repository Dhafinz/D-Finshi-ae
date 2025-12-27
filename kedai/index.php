<?php
session_start();
include '../config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D'Finshi ae - UMKM Makanan & Minuman</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
    <header>
        <div class="logo">D'Finshi ae</div>
        <nav>
            <a href="index.php">Beranda</a>
            <a href="about.php">Tentang Kami</a>
            <a href="products.php">Produk</a>
            <a href="contact.php">Kontak</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <span>Hai, <?php echo $_SESSION['username']; ?>!</span>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="register.php">Daftar</a>
            <?php endif; ?>
        </nav>
    </header>
    
    <section class="hero">
        <img src="../images/menu_minuman,_camilan.jpeg" alt="Produk Unggulan D'Finshi ae">
        <div class="hero-text">
            <h1>Makanan Lezat dari D'Finshi ae</h1>
            <p>Segar, Enak, dan Terjangkau!</p>
            <a href="products.php" class="cta">Lihat Produk</a>
        </div>
    </section>
    
    <section class="featured">
        <h2>Produk Kami</h2>
        <div class="product-grid">
            <?php
            $stmt = $pdo->query("SELECT * FROM products LIMIT 4");
            while ($product = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <div class="product-card">
                    <img src="images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                    <h3><?php echo $product['name']; ?></h3>
                    <p><?php echo $product['description']; ?></p>
                    <span class="price">Rp <?php echo number_format($product['price'], 0, ',', '.'); ?></span>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
    
    <footer>
        <p>&copy; 2023 D'Finshi ae. Jam Operasional: 09.00 - 17.00 Setiap Hari</p>
        <div class="social">
            <a href="https://www.tiktok.com/@dfinshi.ae">TikTok</a>
            <a href="https://www.instagram.com/dfinshi.ae">Instagram</a>
        </div>
    </footer>
</body>
</html>