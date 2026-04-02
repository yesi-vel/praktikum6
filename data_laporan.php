<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Laporan Sampah</title>
</head>
<body>
    

<h2>Daftar Laporan Sampah</h2>

<!-- Tabel data -->
<table border="1">
<thead>
<tr>
<th>ID</th>
<th>Lokasi Sektor</th>
<th>Tanggal Kegiatan</th>
<th>Volume Sampah</th>
<th>Jenis Sampah</th>
<th>Petugas</th>
</tr>
</thead>

<tbody>
<?php include 'read.php'; ?>
</tbody>
</table>
<!-- Tombol aksi -->
<br><br>
<button onclick="location.href='form_input.html'">Tambah Data</button>
<button onclick="location.href='form_update.html'">Update Data</button>
<button onclick="location.href='form_delete.html'">Hapus Data</button>

</body>
</html>