<?php
session_start();
if (!isset ($_SESSION['logged-in']) AND
    !isset ($_SESSION['username']) AND
    !isset ($_SESSION['password'])  ) {
  die ("Anda Belum Login , Klik <a href=../index.php> Disini<a> Untuk Log In");
}else {

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin E-BOOK UBL</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar static-top navbar-toggleable-md navbar-inverse bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Admin E-BOOK UBL</a>
        <div class="navbar-collapse panel-group" id="navbarExample accordion" role="tab-list" aria-multiselectable="true">
            <ul class="sidebar-nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php"><i class="fa fa-fw fa-dashboard"></i> BERANDA ADMIN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="insert_ebook.php"><i class="fa fa-fw fa-area-chart"></i> DATA E-BOOK</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="form_insert_ebook.php"><i class="fa fa-fw fa-area-chart"></i> INSERT E-BOOK</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="update_password.php"><i class="fa fa-fw fa-table"></i> DATA ADMIN</a>
                </li>
              </ul>
            <ul class="navbar-nav ml-auto">

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="content-wrapper py-3">

                <!-- /.container-fluid -->

                <div class="container-fluid">

                    <!-- Breadcrumbs -->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="index.php">Beranda Saya</a></li>
                        <li class="breadcrumb-item active">Cari</li>
                    </ol>


                    <div class="row">
                      <div class="col-lg-10" style="height:960px;">
                        <h4>Pencarian E-Book</h4>
                        <?php
                        include '../assets/koneksi.php';

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
                        <div class='row' style='margin-top:50px;margin-left:-120px;'>
                          <div class='col-md-4'>
                            <h5 style='padding-left:100px;'>Hasil Pencarian</h5>
                            <h6><strong style='padding-left:100px;'><ins><?php echo $keyword; ?></ins></strong></h6>
                            <h6 style='padding-left:100px;'>Total Hasil : <?php echo $asd; ?></h6>
                          </div>
                          <div class='col-md-8'>
                            <div class="table-responsive">
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
                                      <img width='200px' class='img-responsive img-rounded' src='cover/".$cover_tampil."' style='float:left'>
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
                                          <embed src='lampiran/".$hasil['lampiran']."' type='application/pdf' width='470' height='400'/>
                                        </div>
                                        <div class='modal-footer' style='margin-top:20px;'>
                                            <a href='../detail.php?no=".$hasil['kode_ebook']."' target='_blank'><button type='submit' class='btn btn-success'>Tampilkan Ukuran Penuh</button></a>
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


                         ?>
                      </div>
                    </div>
                </div>

    </div>
    <!-- /.content-wrapper -->

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/sb-admin.min.js"></script>
</body>
<form class="" action="index.html" method="post">

</form>
</html>
