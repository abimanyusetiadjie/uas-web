<?php 
include 'atas.php'; 
include 'db_config.php';
?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>


<div class="hero">
    <img src="assets/hubungi_kami.jpg" alt="Gambar Hubungi Kami" />
    <div class="overlay_tentangkami">
        <h1>HUBUNGI KAMI</h1>
    </div>
</div>

<body>
    <?php
    // Variabel untuk pesan sukses/gagal
    $popupMessage = '';
    $popupType = ''; // success atau error

    // Periksa apakah form telah disubmit
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Secret Key reCAPTCHA
        $recaptchaSecret = '6Ld53bUqAAAAAMRGUmvuJMaSNIHxDpJUvASd3mP'; // Ganti dengan Secret Key baru Anda
        $recaptchaResponse = $_POST['g-recaptcha-response'];

        // Validasi reCAPTCHA
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => $recaptchaSecret,
            'response' => $recaptchaResponse
        ];

        $options = [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-Type: application/x-www-form-urlencoded',
                'content' => http_build_query($data)
            ]
        ];

        $context = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captchaSuccess = json_decode($verify);

        if ($captchaSuccess->success) {
            // Ambil data form
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $company = htmlspecialchars($_POST['company'] ?? '');
            $phone = htmlspecialchars($_POST['phone'] ?? '');
            $messageBody = htmlspecialchars($_POST['message']);

            // Simpan ke database
            $stmt = $conn->prepare("INSERT INTO messages (name, email, company, phone, message) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $email, $company, $phone, $messageBody);

            if ($stmt->execute()) {
                $popupMessage = "Pesan Anda berhasil dikirim!";
                $popupType = 'success';
            } else {
                $popupMessage = "Pesan gagal dikirim: " . $conn->error;
                $popupType = 'error';
            }
            $stmt->close();
        } else {
            $popupMessage = "Gagal. Coba lagi kirim pesannya";
            $popupType = 'error';
        }
    }
    ?>

    <?php if (!empty($popupMessage)): ?>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Tambahkan pop-up dengan pesan
        const popup = document.createElement("div");
        popup.className =
            "popup-message <?php echo $popupType === 'success' ? 'popup-success' : 'popup-error'; ?>";
        popup.innerHTML = `
                <?php if ($popupType === 'success'): ?>
                    <span>&#x2713;</span> <!-- Centang untuk sukses -->
                <?php else: ?>
                    <span>&#x26A0;</span> <!-- Tanda peringatan untuk error -->
                <?php endif; ?>
                <?php echo $popupMessage; ?>
            `;

        // Masukkan pop-up ke dalam body
        document.body.appendChild(popup);

        // Tampilkan pop-up
        popup.style.display = "block";

        // Hilangkan pop-up setelah 5 detik
        setTimeout(function() {
            popup.style.display = "none";
            popup.remove();
        }, 5000);
    });
    </script>
    <?php endif; ?>

    <div class="container_hubungikami">
        <h1>KIRIM PESAN</h1>
        <form method="POST">
            <div class="form-group">
                <div class="form-floating mb-3">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" placeholder="Nama Anda" required>
                </div>
                <div>
                    <label for="email">E-Mail*</label>
                    <input type="email" name="email" id="email" placeholder="Alamat E-mail Anda" required>
                </div>
            </div>
            <div class="form-group">
                <div>
                    <label for="company">Perusahaan / Organisasi</label>
                    <input type="text" name="company" id="company" placeholder="Nama Perusahaan / organisasi">
                </div>
                <div>
                    <label for="phone">Telepon</label>
                    <input type="tel" name="phone" id="phone" placeholder="Nomor telepon Anda">
                </div>
            </div>
            <div class="form-group">
                <div style="width: 100%;">
                    <label for="message">Isi Pesan*</label>
                    <input type="message" name="message" id="message" placeholder="Isi Pesan Anda...">
                </div>
            </div>

            <div class="chapcha">
                <div class="g-recaptcha" data-sitekey="6Ld53bUqAAAAAIBUgiS-0jVi05XJAW27ueEWQn1"></div>
                <!-- Ganti dengan Site Key baru Anda -->
                <div class="button submit">
                    <button type="submit">KIRIM PESAN</button>
                </div>
            </div>
        </form>
    </div>

    <div class="divider"></div>

    <div class="lokasi_hubungikami">
        <h1>LOKASI KAMI</h1>
        <h3>KANTOR PUSAT</h3>
        <p>Gedung Ir. H. M. Suseno - Jl. R.P Soeroso No.6, Menteng, Jakarta Pusat</p>
        <p>Phone : (+62 21) 398 38706 - Fax: (+62 21) 316 1701</p>
        <p>Hotline: +6281519040071 / +62811998167</p>

        <h3>KANTOR CABANG</h3>
        <p>Gedung Ir. H. M. Suseno - Jl. R.P Soeroso No.6, Menteng, Jakarta Pusat</p>
        <p>Phone : (+62 21) 398 38706 - Fax: (+62 21) 316 1701</p>
        <p>Hotline: +6281519040071 / +62811998167</p>
    </div>
</body>
<?php include 'bawah.php'; ?>