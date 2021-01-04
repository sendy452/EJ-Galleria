<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon"  href="<?= base_url()?>assets/img/logo.ico">
    <title><?php echo $judul; ?></title>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url()?>assets/css/styles.css" rel="stylesheet" />
  </head>
  <body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="<?= base_url()?>assets/img/navbar-logo.svg" alt="" /></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars ml-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?=base_url('index.php/Utama')?>">Home</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#home">History</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#exhibition">Sell Arts</a></li>
            <li class="nav-item"><a class="nav-link"></a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('index.php/Cart')?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
              <span class="label label-success">
                <?= $this->cart->total_items() ?>
              </span>
            </a></li>
            <li class="nav-item dropdown user user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <span class="hidden-xs"><i class="fa fa-user-circle" aria-hidden="true" style="margin-right: 3px;"></i> <?=$this->session->userdata('user');?> </span>
              </a>
              <ul class="dropdown-menu" style="background-color: rgba(0, 0, 0, 0.7);">
                <li class="user-footer nav-item">
                  <div class="pull-left">
                    <a href="<?=base_url('index.php/Utama/profil')?>" class="nav-link"><i class="fa fa-list" aria-hidden="true" style="margin-right: 3px;"></i> History &<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sell Arts</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?=base_url('index.php/Utama/logout')?>" class="nav-link"><i class="fa fa-sign-out-alt" aria-hidden="true"></i> Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead" style="background-image: url(<?= base_url()?>assets/img/header-bg.jpg); height: 900px;">
      <div class="container">
        <div class="masthead-subheading">Welcome To EJ-Galleria</div>
        <div class="masthead-heading text-uppercase">Lets Make money from your art(s)</div>
        <a class="btn btn-info btn-xl text-uppercase js-scroll-trigger" href="#exhibition">Lets Go</a>
      </div>
    </header>
    <!-- Services-->
    <section class="page-section" id="home">
      <div class="container">
        <div class="text-center">
          <h2 class="section-heading text-uppercase">Riwayat Belanja</h2>
          <h3 class="section-subheading text-muted"></h3>
        </div>
        <div class="row text-center">
          <table class="table table-hover table-striped text-center">
            <tr>
              <td>No</td>
              <td>Total Barang</td>
              <td>Total Harga</td>
              <td>Jenis Pengiriman</td>
              <td>Alamat</td>
              <td>Hapus Riwayat</td>
            </tr>
            
            <?php
            $no=1;
            foreach($tampil_history as $history){
            ?>
            <tr>
              <td><?php echo "$no"?></td>
              <td><?= $history->total;?></td>
              <td>Rp. <?= $history->grandtotal;?></td>
              <td><?= $history->pengiriman;?></td>
              <td><?= $history->alamat;?></td>
              <td>
                <a class="btn btn-danger" href="<?=base_url('index.php/Utama/hapus/'.$history->id_transaksi)?>" onclick="return confirm('Yakin Untuk Menghapus?')">Hapus</a>
              </td>
            </tr>
            <?php
            $no++;
            }
            ?>
          </table>
        </div>
      </div>
    </section>
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="exhibition">
      <div class="container">
        <div class="text-center">
          <h2 class="section-heading text-uppercase">Sell Arts</h2>
          <h3 class="section-subheading text-muted">Disini anda dapat menambah karya seni anda yang akan dijual nantinya</h3>
        </div>
        
          <hr>
          <center>
            <form role="form" action="<?=base_url('index.php/Utama/tambahseni')?>" method="post" enctype="multipart/form-data">
            <h4 class="text-uppercase">Tambah Karya Seni</h4>
            <?php
              $notif = $this->session->flashdata('alert');
              if(!empty($notif)){
              echo '<div class="alert alert-info">'.$notif.'</div>';
            }?>
            <p class="item-intro text-muted"></p>
            <div class="form-group">
              <label style="text-align: left;">Nama Seni</label>
              <input type="text" class="form-control" name="nama"/>
            </div>
            <div class="form-group">
              <label>Jenis Seni</label>
              <input type="text" class="form-control" name="jenis" />
            </div>
              <div class="form-group">
                <label>Tanggal Pembuatan</label>
                <input type="date" class="form-control" name="tanggal" data-date-format="d-m-yyyy"/>
              </div>
              <div class="form-group">
                <label>Harga</label>
                <input type="text" class="form-control" name="harga" />
              </div>
              <div class="form-group">
                <label>Gambar Seni</label>
                <input type="file" name="gambar" class="form-control" >
              </div>
              <input type='submit' name='submit' value='Simpan' class='btn btn-success' style="align-content: left;">
            </form>
          </center>
          <hr>
        <br><br>
        <center>
         <?php
          $notif = $this->session->flashdata('notif');
          if(!empty($notif)){
          echo '<div class="alert alert-info">'.$notif.'</div>';
          }?>
        </center>
        <div class="row" align="center">


          <?php
          foreach ($tampil_user as $detail) {
          echo"
          <div class='col-lg-4 col-sm-6 mb-4'>
            <div class='portfolio-item'>
              <a class='portfolio-link' data-toggle='modal'>
              <img class='img-fluid' src='".base_url()."assets/img/portfolio/$detail->gambar_seni' alt=''/></a>
              <div class='portfolio-caption' style='text-align: left;'>
                <div class='portfolio-caption-heading'>
                  $detail->nama_seni
                  <button class='btn btn-success' data-toggle='modal' data-target='#modal$detail->id_seni' style='float: right; margin-top: 10px;'><i class='fa fa-edit' aria-hidden='true'></i> Ubah</button>
                </div>
                <div class='portfolio-caption-subheading text-muted'>".Tanggal("$detail->tanggal_buat")."</div>
              </div>
            </div>
          </div>
          <!-- Modal 1-->
          <div class='portfolio-modal modal fade' id='modal$detail->id_seni' tabindex='-1' role='dialog' aria-hidden='true' aria-labelledby='myModalLabel'>
            <div class='modal-dialog'>
              <div class='modal-content'>
                <div class='close-modal' data-dismiss='modal'><img src='". base_url()."assets/img/close-icon.svg' alt='Close modal' /></div>
                <div class='container'>
                  <div class='row justify-content-center'>
                    <div class='col-lg-8'>
                      <div class='modal-body'>
                        <form role='form' action='".base_url()."index.php/Utama/editseni/".$detail->id_seni."' method='post' enctype='multipart/form-data'>
                          ";?>
                          <!-- Project Details Go Here-->
                          <h2 class="text-uppercase">Ubah Data Seni</h2>
                          <p class="item-intro text-muted"></p>
                          <div class="form-group">
                            <label style="align: : left;">Nama Seni</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $detail->nama_seni?>"/>
                          </div>
                          <div class="form-group">
                            <label>Jenis Seni</label>
                            <input type="text" class="form-control" name="jenis" value="<?php echo $detail->jenis_seni?>"/>
                          </div>
                          <div class="form-group">
                            <label>Tanggal Pembuatan</label>
                            <input type="text" value="<?php echo $detail->tanggal_buat ?>" onfocus="(this.type='date')" class="form-control" name="tanggal" data-date-format="d-m-yyyy"/>
                          </div>
                          <div class="form-group">
                            <label>Harga</label>
                            <input type="text" class="form-control" name="harga" value="<?php echo $detail->harga?>"/>
                          </div>
                          <div class="form-group">
                            <label>Gambar Seni</label>
                            <input type="file" name="gambar" class="form-control" >
                          </div>
                          <?php echo"
                          <input type='submit' name='submit' value='Simpan' class='btn btn-success' style='margin-right:50px;'>
                           <a href='".base_url()."index.php/Utama/hapusseni/$detail->id_seni' type='button' class='btn btn-danger glyphicon glyphicon-trash' style='margin-left:50px;'><i class='fas fa-trash-alt' aria-hidden='true'></i></i> Hapus</a>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            ";}?>
          </div>
        </div>
      </section>
      <!-- Footer-->
      <footer class="footer py-4">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-4 text-lg-left">Copyright ©EJ-Galleria 2020</div>
            <div class="col-lg-4 my-3 my-lg-0">
            </div>
            <div class="col-lg-4 text-lg-right">
              <a style="font-size: 16px;">Find Us More On:</a>
              <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
              <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
              <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
        </div>
      </footer>
      <!-- Portfolio Modals-->
      <!-- Bootstrap core JS-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
      <!-- Third party plugin JS-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
      <!-- Contact form JS-->
      <script src="<?= base_url()?>assets/mail/jqBootstrapValidation.js"></script>
      <script src="<?= base_url()?>assets/mail/contact_me.js"></script>
      <!-- Core theme JS-->
      <script src="<?= base_url()?>assets/js/scripts.js"></script>
    </body>
  </html>