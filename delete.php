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

// Proses hapus
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $sql = "DELETE FROM Pembersihan WHERE id_Laporan = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: data_laporan.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>