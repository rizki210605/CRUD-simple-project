<?php
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Koneksi ke database
    include '../koneksi.php';

    // Mengecek apakah user terdaftar di tabel admin
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Jika user terdaftar, maka membuat session dan mengarahkan ke halaman admin
        $_SESSION['admin'] = $row;
        header('location: admin.php');
    } else {
        // Jika user tidak terdaftar, maka menampilkan pesan error
        $error = 'Username atau password salah';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    
    <title>Login User</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/style.css">
    <script src="../asset/js/script.js"></script>
</head>
<body>
    <div class="container">
    <img class="gambar" src="../asset/img/covid-19-removebg-preview.png">
    <img class="gambar" src="../asset/img/jateng-removebg-preview.png">
    <img class="gambar" src="../asset/img/smkn9-removebg-preview.png">
    </div>
    <h1 class="login">Login User</h1>
    <div class="link-container">
	<a href="../home.php">Home</a>
  	<a href="../daftar.php">Daftar</a>
    </div>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Login"></td>
            </tr>
        </table>
    </form>
</body>
</html>
