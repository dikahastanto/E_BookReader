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
                    <a class="nav-link" href="index.php"><i class="fa fa-fw fa-dashboard"></i> BERANDA ADMIN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="insert_ebook.php"><i class="fa fa-fw fa-area-chart"></i> DATA E-BOOK</a>
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
                        <li class="breadcrumb-item active"><a href="insert_ebook.php">DATA E-Book</a></li>
                        <li class="breadcrumb-item active">Detail E-Book</li>
                    </ol>

<?php
include '../assets/koneksi.php';

$kode = $_GET['kode'];

$sql = "SELECT * FROM e_book WHERE kode_ebook='$kode'";
$query = mysqli_query($konek,$sql);

$data=mysqli_fetch_array($query);

 ?>
                    <div class="row">
                      <div class="col-lg-10" style="height:960px;">
                        <form action="update_process.php?kode=<?php echo $data['kode_ebook'] ?>" method="post" enctype="multipart/form-data">
                          <input class="form-control" type="text" name="kode_ebook" placeholder="Kode E-BOOK" value="<?php echo $data['kode_ebook'] ?>"><br>
                          <input class="form-control" type="text" name="judul" placeholder="Judul E-BOOK" value="<?php echo $data['judul'] ?>"><br>
                          <input class="form-control" type="text" name="pengarang" placeholder="Pengarang" value="<?php echo $data['pengarang'] ?>"><br>
                          <input class="form-control" type="text" name="penerbit" placeholder="Penerbit" value="<?php echo $data['penerbit'] ?>"><br>
                          <input class="form-control" type="text" name="edisi" placeholder="Edisi" value="<?php echo $data['edisi'] ?>"><br>
                          <input class="form-control" type="text" name="isbn/issn" placeholder="ISBN/ISSN" value="<?php echo $data['isbn_issn'] ?>"><br>
                          <select class="form-control" name="tahun">
                            <option selected value="<?php echo $data['tahun'] ?>"><?php echo $data['tahun']; ?></option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                          </select><br>
                          <input class="form-control" type="text" name="tempat" placeholder="Tempat Terbit" value="<?php echo $data['tempat_terbit'] ?>"><br>
                          <input class="form-control" type="text" name="klasifikasi" placeholder="Klasifikasi" value="<?php echo $data['klasifikasi'] ?>"><br>
                          <select class="form-control" name="bahasa">
                            <option value="<?php echo $data['bahasa'] ?>"><?php echo $data['bahasa']; ?></option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Inggris">Inggris</option>
                          </select><br>
                          <input class="form-control" type="text" name="deskripsi" placeholder="Deskripsi Fisik" value="<?php echo $data['deskripsi_fisik'] ?>"><br>
                          <font color="red">* Cover E-Book (Format : jpg,jpeg,png)</font> --- (File Saat Ini <strong><?php  echo $data['cover']; ?></strong> ) --- Kosongkan Bila Tidak Mengubah Cover
                          <input class="form-control" type="file" name="image"><br>
                          <font color="red">* Lampiran E-Book (Format : PDF)</font> --- (File Saat Ini <strong><?php  echo $data['lampiran']; ?></strong> ) --- Kosongkan Bila Tidak Mengubah Lampiran
                          <input class="form-control" type="file" name="file"><br>
                          <input type="submit" value="Update" class="btn btn-success">
                        </form>
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
