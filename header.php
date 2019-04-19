<div class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img width="100" class="img-responsive img-rounded" src="assets/img/logo_ubl.jpg"></a>
      <h3 style="color:white;">E-Book <br> Universitas Bandar Lampung</h3>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sign In</a>
            <ul class="dropdown-menu">
              <div class="form-group" style="width:360px;height:210px;">
                <center><h4 style="color:black;">Silahka Log In Disini</h4></center>
                <div class="col-xs-10 col-md-offset-1">
                  <form action="login_process.php" method="post">
                    <input type="text" name="username" class="form-control" placeholder="Username"><br>
                    <input type="password" name="password" class="form-control" placeholder="Password"><br>
                    <input type="submit" name="kirim" value="Log In" class="btn btn-success">
                  </form>
                </div>
              </div>
            </ul>
        </li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>
