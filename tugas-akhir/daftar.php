<?php

if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $agama = $_POST['agama'];
    $no_hp = $_POST['no_hp'];

    // Koneksi ke database
    include 'koneksi.php';

    // Menambahkan data pengguna baru ke dalam tabel users
    $sql = "INSERT INTO user (user_id, username, password, fullname, email, agama, no_hp) VALUES ('$user_id','$username', '$password', '$fullname', '$email', '$agama', '$no_hp')";
    mysqli_query($koneksi, $sql);

    header('location: admin/admin.php');
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman User - Daftar Pengguna</title>
    <link rel="stylesheet" type="text/css" href="asset/css/style.css">
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
    <a href="help.php">help</a>
    </div>

    <div class="container">
    <img class="gambar" src="asset/img/covid-19-removebg-preview.png">
    <img class="gambar" src="asset/img/jateng-removebg-preview.png">
    <img class="gambar" src="asset/img/smkn9-removebg-preview.png">
    </div>

    <h1 class="daftar">Daftar-User</h1>
    <br><br>
    <h4 class="h4">Selamat Daftar User</h4>
    <div class="link-container">
	<a href="home.php">Home</a>
  	<a href="daftar.php">Daftar</a>
  	<a href="admin/index.php">Entry Data</a>
  	<a href="admin/admin.php">User</a>
	</div>
    <form method="post">
        <table class="tbl-daftar">
            <tr>
                <td>User ID</td>
                <td><input type="text" name="user_id" required></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td>Full Name</td>
                <td><input type="text" name="fullname" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td>Agama</td>
                <td><input type="text" name="agama" required></td>
            </tr>
            <tr>
                <td>Nomor HP</td>
                <td><input type="text" name="no_hp" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
    
</body>
<footer class="footer">@Rizki Ardiansyah Novianto</footer>
</html>
