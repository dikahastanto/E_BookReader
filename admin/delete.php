<?php
include '../assets/koneksi.php';

$kode = $_GET['kode'];


$sql1 = "SELECT * FROM e_book WHERE kode_ebook='$kode'";
$query1 = mysqli_query($konek,$sql1);
$data=mysqli_fetch_array($query1);

$nama_file = $data['cover'];
$nama_lampiran = $data['lampiran'];

if ($nama_file=="") {
  echo "<script type=text/Javascript> alert('File Cover Sudah Tidak Ada')
          window.location = 'insert_ebook.php';
        </script>";
}else {
  unlink("cover/".$nama_file);
}


if ($nama_lampiran=="") {
  echo "<script type=text/Javascript> alert('Lampiran Sudah Tidak Ada')
          window.location = 'insert_ebook.php';
        </script>";
}else {
  unlink("lampiran/".$nama_lampiran);
}

$sql = "DELETE FROM e_book WHERE kode_ebook='$kode'";
$query = mysqli_query($konek,$sql);

if ($query) {
  echo "<script type=text/Javascript> alert('Data Berhasil Hapus')
          window.location = 'insert_ebook.php';
        </script>";
}else {
  echo "<script type=text/Javascript> alert('Data Gagal Hapus')
          window.location = 'insert_ebook.php';
        </script>";
}
?>
