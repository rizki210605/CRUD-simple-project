<?php
session_start();

// Memeriksa apakah pengguna sudah login sebagai admin
if (!isset($_SESSION['admin'])) {
    header('location: login.php');
    exit();
}

// Menampilkan data pengguna dari tabel user
include '../koneksi.php';
$sql = "SELECT * FROM user";
$result = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman User</title>
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

    <h3 class="DUA">Data User</h3>
    <div class="link-container">
	<a href="../home.php">Home</a>
  	<a href="../daftar.php">Daftar</a>
  	<a href="../admin/index.php">Entry Data</a>
  	<a href="../admin/admin.php">User</a>
	</div>
    <div class="admin">
    <table border="1"class="tbl-admin">
        <tr>
            <td>ID</td>
            <td>Nama</td>
            <td>Password</td>
            <td>Full Name</td>
            <td>Email</td>
            <td>Agama</td>
            <td>Nomor HP</td>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['agama']; ?></td>
                <td><?php echo $row['no_hp']; ?></td>
                <td>
                    <a href="../admin/update.php?user_id=<?php echo $row['user_id']; ?>">Edit</a>
                    <a href="../admin/deleted.php?user_id=<?php echo $row['user_id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    </div>
</body>
<footer class="footer">@copyrigh Rizki Ardiansyah Novianto</footer>

</html>
