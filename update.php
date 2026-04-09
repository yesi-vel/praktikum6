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

    $id = $_POST["id"];
    $lokasi = $_POST["Lokasi_Sektor"];
    $tanggal = $_POST["Tanggal_Kegiatan"];
    $volume = $_POST["Volume_Sampah"];
    $jenis = $_POST["Jenis_Sampah"];
    $petugas = $_POST["Petugas"];
    $uploadDir = 'uploads/';
$newFileName = $_POST['file_lama']; // pakai lama dulu

if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == 0) {

    $fileName = $_FILES['fileToUpload']['name'];
    $tmpName  = $_FILES['fileToUpload']['tmp_name'];

    $imageFileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg','jpeg','png'];

    if (in_array($imageFileType, $allowedTypes)) {
        $newFileName = time() . "." . $imageFileType;
        move_uploaded_file($tmpName, $uploadDir . $newFileName);
    }
}

    $sql = "UPDATE Pembersihan 
         SET Lokasi_Sektor=?, Tanggal_Kegiatan=?, Volume_Sampah=?, Jenis_Sampah=?, Petugas=?, file=?
            WHERE id_Laporan=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisssi", $lokasi, $tanggal, $volume, $jenis, $petugas, $newFileName, $id);

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