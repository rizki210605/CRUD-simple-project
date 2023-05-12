<?php
    include('../koneksi.php');
    $user_id = $_GET['user_id'];
    $sql = "DELETE FROM user WHERE user_id='$user_id'";
    if(mysqli_query($koneksi, $sql)) {
        echo "<script>alert('Data berhasil dihapus');</script>";
        header("refresh:0.1;url=admin.php");
    } else {
        echo "<script>alert('Gagal menghapus data');</script>";
        header("refresh:0.1;url=admin.php");
    }
?>

