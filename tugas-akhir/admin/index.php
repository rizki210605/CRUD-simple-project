<?php
session_start();

// Memeriksa apakah pengguna sudah login sebagai admin
if (!isset($_SESSION['admin'])) {
    header('location: login.php');
    exit();
}

include '../koneksi.php';

$sql = "SELECT * FROM data_Masuk";
$result = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD PHP HTML CSS</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/style.css">
    <script src="../asset/js/script.js"></script>
</head>
<body class="menu-data">
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

    <h1 class="index">Daftar User</h1>
    <div class="link-container">
	<a href="../home.php">Home</a>
  	<a href="../daftar.php">Daftar</a>
  	<a href="../admin/index.php">Entry Data</a>
  	<a href="../admin/admin.php">User</a>
	</div>
    <table class="tbl-index">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tanggal Diagnosa</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['nik']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['tgl_diagnosa']; ?></td>
                <td><?php echo $row['keterangan']; ?></td>
                <td>
                    <a href="edit.php?nik=<?php echo $row['nik']; ?>">Edit</a>
                    <a href="delete.php?nik=<?php echo $row['nik']; ?>">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <div class="add">
    <a href="add.php">Tambah User</a>
    </div>
</body>
<footer class="footer">@copyrigh Rizki Ardiansyah Novianto</footer>

</html>
