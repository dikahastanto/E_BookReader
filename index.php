<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <title>Read E-Book Application</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- Fonts from Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <?php include 'header.php'; ?>

	<div id="headerwrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<h1>Cari E-Book Berdasarkan
          Judul Atau Pengarang</h1>
					<form class="form-inline" role="form" action="cari.php">
					  <div class="form-group">
					    <input name="keyword" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Kata Kunci">
					  </div>
					  <button type="submit" class="btn btn-warning btn-lg">Cari</button>
					</form>
				</div><!-- /col-lg-6 -->
				<div class="col-lg-6">
					<img class="img-responsive" src="assets/img/buku.png" width="500">
				</div><!-- /col-lg-6 -->

			</div><!-- /row -->
		</div><!-- /container -->
	</div><!-- /headerwrap -->


	<?php include 'assets/e_book_terbaru.php'; ?>
  <?php include 'assets/e_book_best.php'; ?>

	<div class="container">
		<hr>
		<p class="centered">@copyright UBL 2017. Creted By Dika Hastanto</p>
	</div><!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
