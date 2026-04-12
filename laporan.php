<?php
class Laporan {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function insert($data, $file) {
        $uploadDir = 'uploads/';
        $namaFile = NULL;

        if ($file['error'] == 0) {
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $namaFile = time() . "." . $ext;
            move_uploaded_file($file['tmp_name'], $uploadDir . $namaFile);
        }

        $sql = "INSERT INTO Pembersihan 
        (Lokasi_Sektor, Tanggal_Kegiatan, Volume_Sampah, Jenis_Sampah, Petugas, gambar) 
        VALUES (?,?,?,?,?,?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssisss",
            $data['Lokasi_Sektor'],
            $data['Tanggal_Kegiatan'],
            $data['Volume_Sampah'],
            $data['Jenis_Sampah'],
            $data['Petugas'],
            $namaFile
        );

        return $stmt->execute();
    }

    public function update($data, $file) {
        $uploadDir = 'uploads/';
        $namaFile = $data['file_lama'];

        if ($file['error'] == 0) {
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $namaFile = time() . "." . $ext;
            move_uploaded_file($file['tmp_name'], $uploadDir . $namaFile);
        }

        $sql = "UPDATE Pembersihan 
        SET Lokasi_Sektor=?, Tanggal_Kegiatan=?, Volume_Sampah=?, Jenis_Sampah=?, Petugas=?, gambar=?
        WHERE id_Laporan=?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssisssi",
            $data['Lokasi_Sektor'],
            $data['Tanggal_Kegiatan'],
            $data['Volume_Sampah'],
            $data['Jenis_Sampah'],
            $data['Petugas'],
            $namaFile,
            $data['id_Laporan']
        );

        return $stmt->execute();
    }
}
?>