<?php
var_dump($_POST);
include 'koneksi.php';

$sektor  = $_POST['Lokasi_Sektor'];
$tanggal = $_POST['Tanggal_Kegiatan'];
$jumlah  = $_POST['Volume_Sampah'];
$jenis   = $_POST['Jenis_Sampah'];
$petugas = $_POST['Petugas'];

$sql = "INSERT INTO Pembersihan 
(Lokasi_Sektor, Tanggal_Kegiatan, Volume_Sampah, Jenis_Sampah, Petugas) 
VALUES ('$sektor','$tanggal','$jumlah','$jenis','$petugas')";

if ($conn->query($sql) === TRUE) {
    header("Location: data_laporan.php");
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>