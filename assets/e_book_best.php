<div class="container">
  <div class="row mt centered">
    <div class="col-lg-6 col-lg-offset-3">
      <h1>The BEST E-BOOK<br/></h1>
      <h3>Kolkesi E-Book Terbaik</h3>
    </div>
  </div>
  <div class="row mt centered">
    <?php
        include 'koneksi.php';

        $sql = "SELECT * FROM e_book WHERE deskripsi_fisik LIKE ('%Best%') LIMIT 3";
        $query = mysqli_query($konek,$sql);

        while ($data=mysqli_fetch_array($query)) {
          $cover = $data['cover'];
          if ($cover=="") {
            $cover_tampil = "default.png";
          }else {
            $cover_tampil = $cover;
          }
          echo "<div class='col-lg-4'>
                  <center><img style='height:200px;width:170px;' class='img-responsive img-rounded' src='admin/cover/".$cover_tampil."'></center>
                  <h4>".$data['judul']."</h4>
                  <p>".$data['pengarang']."</p>
                </div>
          ";
        }


     ?>
  </div>

</div>
