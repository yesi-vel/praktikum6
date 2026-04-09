<?php
include 'koneksi.php';

$sql = "SELECT * FROM Pembersihan";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>{$row['id_Laporan']}</td>
    <td>{$row['Lokasi_Sektor']}</td>
    <td>{$row['Tanggal_Kegiatan']}</td>
    <td>{$row['Volume_Sampah']}</td>
    <td>{$row['Jenis_Sampah']}</td>
    <td>{$row['Petugas']}</td>
    <td><img src='uploads/".$row['file']."' width='100'></td>
    
   

    </tr>";
}
?>