<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil dan membersihkan data yang diinputkan
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    // Alamat email tujuan
    $to = "cvbarumarta@gmail.com";
    $subject = "Pesan dari Form Kontak";

    // Format isi email
    $body = "Nama: $name\n";
    $body .= "Email: $email\n";
    $body .= "Pesan:\n$message\n";

    // Header untuk email
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Mengirim email dan menangani error
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (mail($to, $subject, $body, $headers)) {
            echo "Pesan Anda berhasil dikirim!";
        } else {
            echo "Maaf, terjadi kesalahan saat mengirim pesan. Silakan coba lagi.";
        }
    } else {
        echo "Alamat email tidak valid!";
    }
} else {
    echo "Metode pengiriman tidak valid!";
}
?>

