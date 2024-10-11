<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validasi email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Pengaturan email
        $to = "bbayu21k@gmail.com"; // Alamat email administrator
        $subject = "Pesan Baru dari " . $name;
        $body = "Nama: " . $name . "\n";
        $body .= "Email: " . $email . "\n\n";
        $body .= "Pesan:\n" . $message . "\n";

        $headers = "From: " . $email;

        // Kirim email
        if (mail($to, $subject, $body, $headers)) {
            echo "Pesan Anda telah dikirim.";
        } else {
            echo "Pesan gagal dikirim.";
        }
    } else {
        echo "Email tidak valid.";
    }
}
?>
