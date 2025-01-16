<?php include 'atas.php'; ?>

<?php
// Data untuk elemen dinamis
$menuItems = [
    ["label" => "Home", "link" => "index.php"],
    ["label" => "Tentang Kami", "link" => "tentangkami.php"],
    ["label" => "Layanan Kami", "link" => "#"],
    ["label" => "Artikel", "link" => "#"],
    ["label" => "Hubungi Kami", "link" => "hubungikami.php"],
];

$profil = "Didirikan pada tahun 2018, Ini membuktikan bahwa INAKLUG merupakan konsultan pendidikan internasional yang berpengalaman, terbesar, terpercaya dan juga memiliki jam terbang tinggi untuk melayani para anak-anak muda Indonesia untuk menuntut ilmu di berbagai negara maju dunia.";

$visiMisi = [
    [
        "title" => "VISI",
        "image" => "assets/visi.jpg",
        "content" => "Membangun Sumber Daya Indonesia yang mempunyai daya saing tinggi, tangguh secara internasional untuk menghadapi persaingan di era globalisasi serta membangun karakter pemimpin Indonesia masa depan yang tangguh, mandiri, dan profesional",
    ],
    [
        "title" => "MISI",
        "image" => "assets/misi.png",
        "content" => "Memfasilitasi siswa Indonesia untuk mengenyam pendidikan di berbagai perguruan tinggi di lebih dari 25 negara maju di dunia dengan layanan yang profesional. <br><br> Memberikan bantuan konsultasi terhadap siswa/i Indonesia dalam mempersiapkan studinya dari berbagai aspek, baik aspek sosial, budaya, maupun pendidikan",
    ],
];

$contactInfo = [
    "address" => "Gedung Ir. H. M. Suseno - Jl. R.P Soeroso No.6, Menteng, Jakarta Pusat",
    "phone" => "(+62 21) 398 38706 - Fax: (+62 21) 316 1701",
    "hotline" => "+6281519040071 / +62811998167",
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Klug</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img alt="Logo Klug" src="assets/klug.png" />
        </div>
        <div class="menu">
            <?php foreach ($menuItems as $item): ?>
                <a href="<?= $item['link'] ?>"> <?= $item['label'] ?> </a>
            <?php endforeach; ?>
        </div>
        <div class="search-box">
            <img alt="search" src="assets/search.png" />
        </div>
        <a class="cta" href="#">DAFTAR ON-LINE</a>
    </div>

    <div class="hero">
        <img src="assets/header_tentangkami_2.png" alt="Gambar Header Tentang Kami" />
        <div class="overlay_tentangkami">
            <h1>TENTANG KAMI</h1>
        </div>
    </div>

    <div class="profil_tentangkami">
        <h2>PROFIL</h2>
        <p><?= $profil ?></p>
    </div>

    <div class="container">
        <div class="visi_misi_core">
            <?php foreach ($visiMisi as $item): ?>
                <div class="article">
                    <img alt="<?= $item['title'] ?>" height="200" src="<?= $item['image'] ?>" width="300" />
                    <h3><?= $item['title'] ?></h3>
                    <p><?= $item['content'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="button-container">
            <button>LAYANAN KAMI</button>
        </div>
        <div class="divider"></div>
    </div>

    <div class="contact">
        <h1>HUBUNGI KAMI</h1>
        <h2>KANTOR PUSAT</h2>
        <p><?= $contactInfo['address'] ?></p>
        <p>Phone: <?= $contactInfo['phone'] ?></p>
        <p>Hotline: <?= $contactInfo['hotline'] ?></p>
        <div class="buttons">
            <a href="#" class="button button-primary">LOKASI KAMI</a>
            <a href="#" class="button button-secondary">KIRIM PESAN</a>
        </div>
    </div>

    <br><br>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>

<?php include 'bawah.php'; ?>
