<?php
// include file koneksi.php
include '../koneksi.php';

// cek apakah form telah disubmit
if (isset($_POST['admin'])) {
  // ambil data dari form
  $user_id = $_POST['user_id'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $fullname = $_POST['fullname'];
  $agama = $_POST['agama'];
  $no_hp = $_POST['no_hp'];

  // query untuk update data user berdasarkan id
  $query = "UPDATE user SET 
              username = '$username',
              password = '$password', 
              fullname = '$fullname', 
              email = '$email', 
              agama = '$agama',
              no_hp = '$no_hp'
            WHERE user_id = $user_id";
  $result = mysqli_query($koneksi, $query);

  // cek apakah update berhasil
  if ($result) {
    // redirect ke halaman admin.php
    header('Location: admin.php');
    exit();
  } else {
    echo "Error: " . mysqli_error($koneksi);
  }
}

// ambil id user dari parameter URL
$user_id = $_GET['user_id'];

// query untuk mengambil data user berdasarkan id
$query = "SELECT * FROM user WHERE user_id = '$user_id'";
$result = mysqli_query($koneksi, $query);

// cek apakah data user ditemukan
if (mysqli_num_rows($result) == 1) {
  // ambil data user
  $row = mysqli_fetch_assoc($result);
  $username = $row['username'];
  $password = $row['password'];
  $fullname = $row['fullname'];
  $email = $row['email'];
  $agama = $row['agama'];
  $no_hp = $row['no_hp'];
} else {
  // redirect ke halaman admin.php jika data user tidak ditemukan
  header('Location: admin.php');
  exit();
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Update User</title>
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

    <h1 class="update">Update User</h1>
    <div class="link-container">
	  <a href="../home.php">Home</a>
  	<a href="../daftar.php">Daftar</a>
  	<a href="../admin/index.php">Entry Data</a>
  	<a href="../admin/admin.php">User</a>
	</div>

 
  <form action="update.php" method="post">
  <table class="fupdate" border="1">
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <tr>
      <td><label>Username:</label></td>
      <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
    </tr>
    <tr>
      <td><label>Password:</label></td>
      <td><input type="password" name="password" value="<?php echo $password; ?>"></td>
    </tr>
    <tr>
      <td><label>Full Name:</label></td>
      <td><input type="password" name="fullname" value="<?php echo $fullname; ?>"></td>
    </tr>
    <tr>
      <td><label>Email:</label></td>
      <td><input type="email" name="email" value="<?php echo $email; ?>"></td>
    </tr>
    <tr>
      <td><label>Agama:</label></td>
      <td><input type="text" name="agama" value="<?php echo $agama; ?>"></td>
    </tr>
    <tr>
      <td><label>Nomor HP:</label></td>
      <td><input type="text" name="no_hp" value="<?php echo $no_hp; ?>"></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="submit" value="Update"></td>
    </tr>
  </table>
</form>

</body>
<footer class="footer">@Rizki Ardiansyah Novianto</footer>
</html>
