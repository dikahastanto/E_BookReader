<div class="container">
  <div class="row mt centered">
    <div class="col-lg-6 col-lg-offset-3">
      <h1>E-BOOK Terbaru<br/></h1>
      <h3>Beberapa Koleksi Terbaru E-Book Universitas Bandar Lampung</h3>
    </div>
  </div>
  <div class="row mt centered">
    <?php
        include 'koneksi.php';

        $sql1 = "SELECT * FROM e_book";
        $query1 = mysqli_query($konek,$sql1);
        $jumlahdata = mysqli_num_rows($query1);

        $batas_bwh = $jumlahdata-3;

        $sql = "SELECT * FROM e_book LIMIT  $batas_bwh,3";
        $query = mysqli_query($konek,$sql);

        while ($data=mysqli_fetch_array($query)) {
          $cover_terbaru = $data['cover'];
          if ($cover_terbaru=="") {
            $cover_tampil_terbaru = "default.png";
          }else {
            $cover_tampil_terbaru = $cover_terbaru;
          }
          echo "<div class='col-lg-4'>
                  <center><img style='height:250px;' width='200' class='img-responsive img-rounded' src='../e_book/admin/cover/".$cover_tampil_terbaru."'></center>
                  <h4>".$data['judul']."</h4>
                  <p>".$data['pengarang']."</p>
                </div>
          ";
        }


     ?>
  </div>

</div>
