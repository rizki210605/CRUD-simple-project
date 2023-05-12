<?php
session_start();

// Memeriksa apakah pengguna sudah login sebagai admin
if (!isset($_SESSION['admin'])) {
    header('location: login.php');
    exit();
}

include '../koneksi.php';

$nik = $_GET['nik'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tgl_diagnosa = $_POST['tgl_diagnosa'];
    $keterangan = $_POST['keterangan'];

    $sql = "UPDATE data_masuk SET nama='$nama', tgl_diagnosa='$tgl_diagnosa', keterangan='$keterangan' WHERE nik='$nik'";

    if (mysqli_query($koneksi, $sql)) {
        header('location: index.php');
    } else {
        echo 'Gagal mengupdate data';
    }
}

$sql = "SELECT * FROM data_masuk WHERE nik='$nik'";
$result = mysqli_query($koneksi, $sql);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
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

    <h1 class="edit-user">Edit User</h1>
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
                <td><input type="text" name="nik" value="<?php echo $user['nik']; ?>" required></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $user['nama']; ?>" required></td>
            </tr>
            <tr>
                <td>Tanggal Diagnosa</td>
                <td><input type="date" name="tgl_diagnosa" value="<?php echo $user['tgl_diagnosa']; ?>" required></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><input type="text" name="keterangan" value="<?php echo $user['keterangan']; ?>" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>
    <div class="edit">
    <a href="index.php">Kembali ke Daftar User</a>
    </div>
</body>
<footer class="footer">@copyrigh Rizki Ardiansyah Novianto</footer>

</html>
