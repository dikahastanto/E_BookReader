<?php
include '../assets/koneksi.php';

$username = $_GET['username'];

$username_baru = $_POST['username'];
$password = $_POST['password'];

$sql = "UPDATE admin SET username='$username_baru', password='$password' WHERE username='$username'";
$query = mysqli_query($konek,$sql);

if ($query) {
  echo "<script type=text/Javascript> alert('Data Berhasil Di Update. Silahkan Log In Kembali !')
          window.location = 'logout.php';
        </script>";
}else {
  echo "<script type=text/Javascript> alert('Data Gagal Di Update')
          window.location = 'update_password.php';
        </script>";
}
?>
