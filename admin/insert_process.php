<?php
include '../assets/koneksi.php';

$kode = $_POST['kode_ebook'];
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

$folder_cover = "cover/";
$asal = $_FILES['image']['tmp_name'];
$foto = $folder_cover. basename($_FILES['image']['name']);
$prosesupload = move_uploaded_file($_FILES['image']['tmp_name'], $foto);

$image = $_FILES['image']['name'];


$folder_lampiran = "lampiran/";
$asal_lampiran = $_FILES['file']['tmp_name'];
$lampiran = $folder_lampiran. basename($_FILES['file']['name']);
$prosesupload_lampiran = move_uploaded_file($_FILES['file']['tmp_name'], $lampiran);

$lampiran_nama = $_FILES['file']['name'];

$sql = "INSERT INTO e_book(kode_ebook,judul,pengarang,penerbit,edisi,isbn_issn,tahun,tempat_terbit,klasifikasi,bahasa,deskripsi_fisik,cover,lampiran) VALUES
('$kode','$judul','$pengarang','$penerbit','$edisi','$s','$tahun','$tempat','$klasifikasi','$bahasa','$desk','$image','$lampiran_nama')";
$query = mysqli_query($konek,$sql);

if ($query) {
  echo "<script type=text/Javascript> alert('Data Berhasil Disimpan')
          window.location = 'insert_ebook.php';
        </script>";
}else {
echo "Gagal";
}
?>
