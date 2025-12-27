<?php
include '../config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $stmt = $pdo->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $message]);
    echo "Pesan terkirim!";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - D'Finshi ae</title>
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/contact.css">
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
    
    <section class="contact">
        <h1>Kontak Kami</h1>
        <form method="POST">
            <input type="text" name="name" placeholder="Nama" required>
            <input type="email" name="email" placeholder="Email" required>
            <textarea name="message" placeholder="Pesan" required></textarea>
            <button type="submit">Kirim</button>
        </form>
        <a href="https://wa.me/6285194925605" class="whatsapp">Pesan via WhatsApp</a>
        <p>Alamat: Ketawang kavling no 1A Jogo Satru Sukodono Sidoarjo</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.5!2d112.7!3d-7.4!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMjQnMDAuMCJTIDExMsKwNDInMDAuMCJF!5e0!3m2!1sen!2sid!4v1234567890" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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