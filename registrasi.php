<?php
include 'koneksi.php';

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO Users (username, password) 
            VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.html");
        exit();
    } else {
        echo "Gagal daftar: " . $conn->error;
    }
}

$conn->close();
?>