<?php
// Konfigurasi database
$host = "localhost"; 
$username = "root"; // Variabel ini bernama $username
$pass = ""; 
$db   = "db_Citarum"; 

// Membuat koneksi
// Pastikan variabel ketiga di sini adalah $username (sesuai di atas)
$conn = new mysqli($host, $username, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    // Jika ADA error, maka hentikan dan munculkan pesan gagal
    die("Koneksi ke database gagal: " . $conn->connect_error);
} else {
    // Jika TIDAK ada error, maka berhasil
   
}

// Tutup koneksi (opsional, tapi bagus untuk latihan)

?>