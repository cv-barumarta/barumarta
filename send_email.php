<<<<<<< HEAD
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

=======
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
>>>>>>> 535cc1e9b02c915e87c273a7650ec3d667a507e6
