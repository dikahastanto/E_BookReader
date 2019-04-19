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
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Beranda Saya</li>
                    </ol>


                    <div class="row">
                      <div class="col-lg-10" style="height:560px;">
                        <h1>SELAMAT DATANG DI HALAMAN ADMIN</h1><br>
                        <form class="form-inline" role="form" action="cari.php">
              					  <div class="form-group">
              					    <input name="keyword" type="text" class="form-control" placeholder="Masukan Kata Kunci">&nbsp;
              					  </div>
              					  <button type="submit" class="btn btn-warning btn-md">Cari</button>
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
