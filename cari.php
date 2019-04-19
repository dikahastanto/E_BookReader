    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.png">

<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/main.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>

<?php
include 'header.php';
include 'assets/koneksi.php';

$keyword = $_GET['keyword'];

$data_per_page = 8;

$page = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$posisi = ($page > 1) ? ($page * $data_per_page) - $data_per_page :0;


if (isset($_GET['page'])) {
  $nopage = $_GET['page'];
}else {
  $nopage = 1;
}

$offset = ($nopage-1)*$data_per_page;

$sql = "SELECT * FROM e_book WHERE judul LIKE ('%$keyword%') LIMIT $offset,$data_per_page";
$query = mysqli_query($konek,$sql);
//$data = mysqli_fetch_array($query);
$asd = mysqli_num_rows($query);

$i = $offset+1;
$jml_kolom = 2;
$cnt=0;
?>
<div class='row' style='margin-top:150px;'>
  <div class='col-md-4'>
    <h3 style='padding-left:100px;'>Hasil Pencarian</h3>
    <h4><strong style='padding-left:100px;'><ins><?php echo $keyword; ?></ins></strong><h4>
    <h3 style='padding-left:100px;'>Total Hasil : <?php echo $asd; ?></h3>
  </div>
  <div class='col-md-8'>
    <div class="table-responsive">
      <h3>Pencarian E-BOOK</h3>
      <table class="table">
        <tr>

<?php
  while ($hasil = mysqli_fetch_array($query)) {
    if ($cnt >=$jml_kolom) {
      echo "</tr><tr>";
      $cnt=0;
    }
    $cnt ++;
    $cover_buku = $hasil['cover'];
    if ($cover_buku=="") {
      $cover_tampil = "default.png";
    }else {
      $cover_tampil = $cover_buku;
    }
    echo "<td width='800px' height='300px'>
              <img width='200px' class='img-responsive img-rounded' src='admin/cover/".$cover_tampil."' style='float:left'>
              <h4>" . $hasil['judul'] ."</h4><br>
              Lampiran : <a href='#mymodal".$hasil['kode_ebook']."' data-toggle='modal' data-target='#mymodal".$hasil['kode_ebook']."'>" .$hasil['lampiran']. "</a><br><br>



          <div id='mymodal".$hasil['kode_ebook']."' class='modal fade' tb-index='-1'role='dialog'>
            <div class='modal-dialog' role='document'>
              <div class='modal-content'>
                <div class='modal-header' style='padding-left:30px;'>
                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                  <h4 class='modal-tittle'>Lampiran <strong>".$hasil['judul']."</strong></h4>
                </div>
                <div style='padding-left:10px;padding-top:20px;'>
                  <embed src='admin/lampiran/".$hasil['lampiran']."' type='application/pdf' width='570' height='400'/>
                </div>
                <div class='modal-footer' style='margin-top:20px;'>
                    <a href='detail.php?no=".$hasil['kode_ebook']."' target='_blank'><button type='submit' class='btn btn-success'>Tampilkan Ukuran Penuh</button></a>
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                </div>
              </div>
            </div>
        </div>
      </td>
    ";
  }



  if ($asd<1) {
    echo "Data Tidak Ada";
  }else {

  }

/*

if ($data=="") {
  echo "Data Tidak Ada";
}else {
  while ($hasil = mysqli_fetch_array($query)) {
    echo "Judul : " . $hasil['title'] ."<br>
          Pengarang : " .$hasil['file_name']. "<br><br>
    ";
  }
}

<embed src='../slims8_akasia-master/repository/".$hasil['file_name']."' type='application/pdf' width='500' height='700'/>

*/
?>
      </table>
      <nav aria-label="Page navigation">
        <ul class="pagination">
      <?php
        $query2 = mysqli_query ($konek, "SELECT * FROM e_book WHERE judul LIKE ('%$keyword%')");
        $jumlahdata = mysqli_num_rows($query2);
        $jumlahhlmn = ceil ($jumlahdata/$data_per_page);

        for ($i=1; $i <= $jumlahhlmn ; $i++) {
          if ($i !=$page) {
            echo "<li><a href='cari.php?keyword=$keyword&page=$i\'>$i</a><li>";
          }else {
            echo "<li><a href='cari.php?keyword=$keyword&page=$i\'>$i</a><li>";
          }
        }
       ?>
        </ul>
      </nav>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
