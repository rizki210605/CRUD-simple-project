<?php
session_start();

// Memeriksa apakah pengguna sudah login sebagai admin
if (!isset($_SESSION['admin'])) {
    header('location: login.php');
    exit();
}

include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tgl_diagnosa = $_POST['tgl_diagnosa'];
    $keterangan = $_POST['keterangan'];

    $sql = "INSERT INTO data_masuk (nik, nama, tgl_diagnosa, keterangan) VALUES ('$nik', '$nama', '$tgl_diagnosa', '$keterangan')";

    if (mysqli_query($koneksi, $sql)) {
        header('location: index.php');
    } else {
        echo 'Gagal menambahkan data';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/style.css">
    <script src="../asset/js/script.js"></script>
</head>
<body>
<div class="lgdaftar">
    <a href="admin/login.php">Login</a>
    </div>
    <div class="lgodaftar">
    <a href="admin/logout.php">Logout</a>
    </div>
    <div class="help">
    <a href="../help.php">help</a>
    </div>

    <div class="container">
    <img class="gambar" src="../asset/img/covid-19-removebg-preview.png">
    <img class="gambar" src="../asset/img/jateng-removebg-preview.png">
    <img class="gambar" src="../asset/img/smkn9-removebg-preview.png">
    </div>
    <h2 class="admin"> User<?php echo $_SESSION['admin']['username']; ?></h2>
    <br><br>

    <h1 class="tambah">Tambah User</h1>
    <div class="link-container">
	<a href="../home.php">Home</a>
  	<a href="../daftar.php">Daftar</a>
  	<a href="../admin/index.php">Entry Data</a>
  	<a href="../admin/admin.php">User</a>
	</div>
    
    <form method="post">
        <table>
            <tr>
                <td>NIK</td>
                <td><input type="text" name="nik" required></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Tanggal Diagnosa</td>
                <td><input type="date" name="tgl_diagnosa" required></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><input type="text" name="keterangan" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>
    <div class="back">
    <a href="index.php">Kembali ke Daftar User</a>
    </div>
</body>
<footer class="footer">@copyrigh Rizki Ardiansyah Novianto</footer>

</html>
