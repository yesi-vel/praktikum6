<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
include 'koneksi.php';
include 'Laporan.php';

$laporan = new Laporan($conn);
$laporan->insert($_POST, $_FILES['fileToUpload']);

$sektor  = $_POST['Lokasi_Sektor'];
$tanggal = $_POST['Tanggal_Kegiatan'];
$jumlah  = $_POST['Volume_Sampah'];
$jenis   = $_POST['Jenis_Sampah'];
$petugas = $_POST['Petugas'];

$uploadDir = 'uploads/';
$newFileName = NULL;

if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == 0) {

    $fileName = $_FILES['fileToUpload']['name'];
    $tmpName  = $_FILES['fileToUpload']['tmp_name'];

    $imageFileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png'];

    if (in_array($imageFileType, $allowedTypes)) {

        $newFileName = time() . "." . $imageFileType;
        $targetFile = $uploadDir . $newFileName;

        move_uploaded_file($tmpName, $targetFile);
    }
}

$sql = "INSERT INTO Pembersihan 
(Lokasi_Sektor, Tanggal_Kegiatan, Volume_Sampah, Jenis_Sampah, Petugas, gambar) 
VALUES ('$sektor','$tanggal','$jumlah','$jenis','$petugas','$newFileName')";

if ($conn->query($sql) === TRUE) {
    header("Location: data_laporan.php");
} else {
    echo "ERROR NYATA: " . $conn->error;
}

$conn->close();
}
?>