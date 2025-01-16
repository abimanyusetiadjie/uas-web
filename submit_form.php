<?php
// Sertakan file konfigurasi database
include 'db_config.php';
include 'hubungikami.hp';
include 'index.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Masukkan Secret Key dari reCAPTCHA
    $recaptchaSecret = '6LdUv7IqAAAAAORN7lCinXRulBBtgqv3OzASdg43';
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
        // Ambil data dari form
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $company = htmlspecialchars($_POST['company'] ?? '');
        $phone = htmlspecialchars($_POST['phone'] ?? '');
        $message = htmlspecialchars($_POST['message']);

        // Simpan data ke database
        $stmt = $conn->prepare("INSERT INTO messages (name, email, company, phone, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $company, $phone, $message);

        if ($stmt->execute()) {
            echo json_encode(['message' => 'Pesan berhasil dikirim dan disimpan ke database!']);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Pesan gagal disimpan ke database: ' . $stmt->error]);
        }
        $stmt->close();
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Verifikasi reCAPTCHA gagal.']);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Metode tidak diizinkan.']);
}
?>