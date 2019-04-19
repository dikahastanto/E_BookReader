<?php
include '../assets/koneksi.php';
$kode = $_GET['kode'];

$sql = "SELECT * FROM e_book WHERE kode_ebook='$kode'";
$query = mysqli_query($konek,$sql);
$data=mysqli_fetch_array($query);
$cover_lama = $data['cover'];
$lampiran_lama = $data['lampiran'];

$folder = "cover/";
$asal1 = $_FILES['image']['tmp_name'];
$cover = $_FILES['image']['name'];

$folder_lampiran = "lampiran/";
$asal_lampiran = $_FILES['file']['tmp_name'];
$lampiran = $_FILES['file']['name'];


if ($cover=="") {
  $cover_simpan = $cover_lama;
}else {
  $cover_simpan = $cover;
  $foto = $folder. basename($_FILES['image']['name']);
  $proses_upload_cover = move_uploaded_file($_FILES['image']['tmp_name'], $foto);
  unlink("cover/".$cover_lama);
}

if ($lampiran=="") {
  $lampiran_simpan = $lampiran_lama;
}else {
  $lampiran_simpan = $lampiran;
  $lampiran1 = $folder_lampiran. basename($_FILES['file']['name']);
  $proses_upload_cover = move_uploaded_file($_FILES['file']['tmp_name'], $lampiran1);
  unlink("lampiran/".$lampiran_lama);
}

$kode_simpan = $_POST['kode_ebook'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$edisi = $_POST['edisi'];
$s = $_POST['isbn/issn'];
$tahun = $_POST['tahun'];
$tempat = $_POST['tempat'];
$klasifikasi = $_POST['klasifikasi'];
$bahasa = $_POST['bahasa'];
$desk = $_POST['deskripsi'];

$sql3 = "UPDATE e_book SET kode_ebook='$kode_simpan',judul='$judul',pengarang='$pengarang',penerbit='$penerbit',edisi='$edisi',isbn_issn='$s',tahun='$tahun',tempat_terbit='$tempat',klasifikasi='$klasifikasi',bahasa='$bahasa',deskripsi_fisik='$desk',cover='$cover_simpan',lampiran='$lampiran_simpan' WHERE kode_ebook='$kode'";
$query3 = mysqli_query($konek,$sql3);

if ($query3) {
  echo "<script type=text/Javascript> alert('Data Berhasil Update')
          window.location = 'insert_ebook.php';
        </script>";
}else {
  echo "<script type=text/Javascript> alert('Data Gagal Di Update')
          window.location = 'insert_ebook.php';
        </script>";
}

?>
