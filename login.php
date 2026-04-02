<?php
session_start();
include 'koneksi.php';

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Users 
            WHERE username='$username' AND password='$password'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['login'] = true;
        header("Location: data_laporan.php");
        exit();
    } else {
        echo "Login gagal!";
    }
}

$conn->close();
?>