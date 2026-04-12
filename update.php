<?php
include 'koneksi.php';
include 'Laporan.php';

$laporan = new Laporan($conn);

// panggil function update dari class
$laporan->update($_POST, $_FILES['fileToUpload']);

header("Location: data_laporan.php");
?>