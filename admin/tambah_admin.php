<?php
include '../assets/koneksi.php';

$username = $_POST['username_tambah'];
$password = $_POST['password_tambah'];

$sql = "INSERT INTO admin (username,password) VALUES ('$username','$password')";
$query = mysqli_query($konek,$sql);

if ($query) {
  echo "<script type=text/Javascript> alert('Data Admin Baru Berhasil Di Simpan')
          window.location = 'update_password.php';
        </script>";
}else {
  echo "<script type=text/Javascript> alert('Data Gagal Di simpan')
          window.location = 'update_password.php';
        </script>";
}
?>
