<?php
include '../assets/koneksi.php';

$username = $_GET['username'];

$sql = "DELETE FROM admin WHERE username='$username'";
$query = mysqli_query($konek,$sql);

if ($query) {
  echo "<script type=text/Javascript> alert('Data Berhasil Dihapus')
          window.location = 'logout.php';
        </script>";
}else {
  echo "<script type=text/Javascript> alert('Data Gagal Dihapus')
          window.location = 'update_password.php';
        </script>";
}
?>
