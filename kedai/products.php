<?php
include '../config.php';
$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - D'Finshi ae</title>
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/products.css">
</head>
<body>
    <header>
        <div class="logo">D'Finshi ae</div>
        <nav>
            <a href="index.php">Beranda</a>
            <a href="about.php">Tentang Kami</a>
            <a href="products.php">Produk</a>
            <a href="contact.php">Kontak</a>
        </nav>
    </header>
    
    <section class="products">
        <h1>Produk Kami</h1>
        <div class="product-list">
            <?php foreach ($products as $product): ?>
                <div class="product">
                    <img src="images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                    <h3><?php echo $product['name']; ?></h3>
                    <p><?php echo $product['description']; ?></p>
                    <p>Rp <?php echo number_format($product['price'], 0, ',', '.'); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    
    <footer>
        <p>&copy; 2023 D'Finshi ae. Jam Operasional: 09.00 - 17.00 Setiap Hari</p>
        <div class="social">
            <a href="https://www.tiktok.com/@dfinshi.ae?_r=1&_t=ZS-92Vv4ngJE5y">TikTok</a>
            <a href="https://www.instagram.com/dfinshi.ae?igsh=OXo3Yzd1NWhnZTgx">Instagram</a>
        </div>
    </footer>
</body>
</html>