<?php
include 'assets/koneksi.php';

$id = $_GET['no'];

$sql = "SELECT * FROM e_book WHERE kode_ebook='$id'";
$query = mysqli_query($konek,$sql);
$data=mysqli_fetch_array($query);

?>

<embed type="application/pdf" src="admin/lampiran/<?php echo $data['lampiran'] ?>" style="width:100%;" height="770">
