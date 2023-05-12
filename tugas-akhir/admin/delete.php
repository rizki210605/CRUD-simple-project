<?php
session_start();

// Memeriksa apakah pengguna sudah login sebagai admin
if (!isset($_SESSION['admin'])) {
    header('location: login.php');
    exit();
}
include '../koneksi.php';

$nik = $_GET['nik'];

$sql = "DELETE FROM data_masuk WHERE nik='$nik'";

if (mysqli_query($koneksi, $sql)) {
    header('location: index.php');
} else {
    echo 'Gagal menghapus data';
}
?>
