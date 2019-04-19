<?php
session_start();
include 'assets/koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
$query = mysqli_query($konek,$sql);


if ($data = mysqli_fetch_array($query)) {
  $_SESSION['logged-in']=true;
  $_SESSION['username']= $_POST['username'];
  $_SESSION['password']= $_POST['password'];
  header('Location: admin/');
}else if ($username=="" or $password=="") {
  $_SESSION['kosong']='kosong';
  echo "<script type=text/Javascript> alert('Username/Password Tidak Boleh Kosong')
          window.location = 'index.php';
        </script>";
}else {
  $_SESSION['salah'] = "salah";
  echo "<script type=text/Javascript> alert('Username/Password Salah')
          window.location = 'index.php';
        </script>";
}

?>
