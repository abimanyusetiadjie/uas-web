<?php include 'atas.php'; ?>

<?php
// Data dinamis
$title = "WEBUAS";
$menus = [
    ["text" => "Home", "link" => "index.php"],
    ["text" => "Tentang Kami", "link" => "tentangkami.php"],
    ["text" => "Layanan Kami", "link" => "#"],
    ["text" => "Artikel", "link" => "#"],
    ["text" => "Hubungi Kami", "link" => "hubungikami.php"]
];
$services = [
    ["image" => "assets/s1.png", "text" => "Studi S1 - Bachelor"],
    ["image" => "assets/s3.png", "text" => "Studi S2 - Master"],
    ["image" => "assets/s2.png", "text" => "Studi S3 - Ph.D"],
    ["image" => "assets/kursus.png", "text" => "Kursus Bahasa Asing"],
    ["image" => "assets/studytour.png", "text" => "Study Tour"],
    ["image" => "assets/ausbildung.png", "text" => "Ausbildung"]
];

$articles = [
    ["image" => "assets/artikel1_1.jpg","text" => "5 Fakta yang Harus Kamu Ketahui Sebelum Studi ke Jerman"],
    ["image" => "assets/artikel2.jpg", "text" => "Uni Eropa Menghadapi Virus Korona"],
    ["image" => "assets/artikel3.jpg", "text" => "Belajar Bahasa Jerman Bersama Goethe Insitut"],
    ["image" => "assets/artikel4.jpg", "text" => "Apa Itu Gates Cambridge? Yuk Cari Tahu"]
];
$partners = [
    "assets/mitra1.jpg", "assets/mitra2.jpg", "assets/mitra3.png", "assets/mitra4.png"
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title; ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="navbar">
        <div class="logo">
            <img alt="Logo Klug" src="assets/klug.png" />
        </div>
        <div class="menu">
            <?php foreach ($menus as $menu): ?>
            <a href="<?php echo $menu['link']; ?>"><?php echo $menu['text']; ?></a>
            <?php endforeach; ?>
        </div>
        <div class="search-box">
            <img alt="search" src="assets/search.png" />
        </div>
        <a class="cta" href="#">DAFTAR ON-LINE</a>
    </div>

    <div class="hero">
        <img src="assets/istana.jpg" alt="Gambar latar Istana" />
        <div class="overlay">
            <div class="text-button-container">
                <h1>INGIN KULIAH DAN BERKARIR<br>DI LUAR NEGERI?</h1>
                <button>SELENGKAPNYA <i class="fas fa-chevron-down"></i></button>
            </div>
        </div>
    </div>

    <div class="content">
        <h2>TENTANG KAMI</h2>
        <p>INAKLUG adalah Konsultan Pendidikan Internasional di Indonesia yang sudah memberangkatkan lebih dari 3000
            mahasiswa Indonesia yang ingin kuliah, perjalanan wisata dan berkarir di negara maju di dunia.</p>
    </div>
    <div class="divider"></div>
    <div class="services">
        <h2>LAYANAN KAMI</h2>
        <div class="service-cards">
            <?php foreach ($services as $service): ?>
            <div class="service-card">
                <img alt="<?php echo $service['text']; ?>" height="200" src="<?php echo $service['image']; ?>"
                    width="300" />
                <div class="overlay">
                    <p><?php echo $service['text']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="container">
        <h2>MITRA KAMI</h2>
        <div class="partners">
            <?php foreach ($partners as $partner): ?>
            <div class="partner">
                <img alt="Partner logo" height="100" src="<?php echo $partner; ?>" width="150" />
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="consultation">
        <div class="consultation-text">
            <h3>GRATIS KONSELING STUDI DI LUAR NEGERI !!!</h3>
            <p>Konsultasi seputar kuliah / bekerja di Luar Negeri</p>
        </div>
        <button class="consultation-button">MULAI KONSULTASI <i class="fas fa-chevron-down"></i></button>
    </div>

    <div class="container">
        <h2>ARTIKEL TERBARU</h2>
        <div class="articles">
            <?php foreach ($articles as $article): ?>
            <div class="article">
                <img alt="<?php echo $article['text']; ?>" height="200" src="<?php echo $article['image']; ?>"
                    width="300" />
                <p><?php echo $article['text']; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="button-container">
            <button>ARTIKEL LAINNYA</button>
        </div>
    </div>
    <div class="divider"></div>

    <div class="contact">
        <h1>HUBUNGI KAMI</h1>
        <h2>KANTOR PUSAT</h2>
        <p>Gedung Ir. H. M. Suseno - Jl. R.P Soeroso No.6, Menteng, Jakarta Pusat</p>
        <p>Phone : (+62 21) 398 38706 - Fax: (+62 21) 316 1701</p>
        <p>Hotline: +6281519040071 / +62811998167</p>
        <div class="buttons">
            <a href="#" class="button button-primary">LOKASI KAMI</a>
            <a href="#" class="button button-secondary">KIRIM PESAN</a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>

<?php include 'bawah.php'; ?>