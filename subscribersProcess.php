<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai email dari formulir
    $email = $_POST["email"];

    // Validasi alamat email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
    } else {
        // Sertakan file koneksi
        include "connection.php";

        // Persiapkan dan jalankan query untuk menyimpan email ke dalam tabel
        $query = $db->prepare("INSERT INTO tb_subscribers (email) VALUES (?)");
        $query->bind_param("s", $email);

        if ($query->execute()) {
            echo "Email successfully added to subscribers list!";
        } else {
            // Cek apakah koneksi terputus
            $connect_error = mysqli_connect_error();
            if ($connect_error) {
                die("Connection failed: " . $connect_error);
            }

            // Ulangi proses penyimpanan setelah rekoneksi
            $db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
            if ($db->connect_error) {
                die("Reconnection failed: " . $db->connect_error);
            }

            $query = $db->prepare("INSERT INTO tb_subscribers (email) VALUES (?)");
            $query->bind_param("s", $email);

            if ($query->execute()) {
                echo "Email successfully added to subscribers list after reconnection!";
            } else {
                echo "Error adding email to database even after reconnection: " . $query->error;
            }

            // Tutup statement
            $query->close();
        }

        // Tutup koneksi
        $db->close();
    }
}
?>