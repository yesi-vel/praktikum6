<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_Citarum";

// Koneksi
$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses update
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id_Laporan"];
    $lokasi = $_POST["Lokasi_Sektor"];
    $tanggal = $_POST["Tanggal_Kegiatan"];
    $volume = $_POST["Volume_Sampah"];
    $jenis = $_POST["Jenis_Sampah"];
    $petugas = $_POST["Petugas"];

    $sql = "UPDATE Pembersihan 
            SET Lokasi_Sektor=?, Tanggal_Kegiatan=?, Volume_Sampah=?, Jenis_Sampah=?, Petugas=? 
            WHERE id_Laporan=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssissi", $lokasi, $tanggal, $volume, $jenis, $petugas, $id);

    if ($stmt->execute()) {
        header("Location: data_laporan.php");
        exit();
    } else {
        echo "Gagal memperbarui data: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>