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
    <nav class="navbar navbar-shrink" id="mainNav" style="background-color: black;">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?=base_url('index.php/Utama')?>"><img src="<?= base_url()?>assets/img/navbar-logo.svg" alt="" /></a>
      </div>
    </nav>
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="exhibition">
      <div class="container">
        <div class="text-center">
          <h2 class="section-heading text-uppercase">Transaksi</h2>
          <h3 class="section-subheading text-muted"></h3>
          <?php
              $notif = $this->session->flashdata('pesan');
              if(!empty($notif)){
              echo '<div class="alert alert-info">'.$notif.'</div>';
            }?>
        </div>
        <form action="<?=base_url('index.php/Cart/simpan')?>" method="post">
          <table class="table table-hover table-striped text-center">
            <tr>
              <td>Nama Pembeli</td>
              <td>Nama Seni</td>
              <td>Jumlah</td>
              <td>Harga</td>
              <td>Subtotal Harga</td>
              <td>Aksi</td>
            </tr>
            
            <?php
            foreach($this->cart->contents() as $items){
            ?>
            <tr>
              <td>
                <input type="hidden" name="id[]" value="<?=$items['id']?>">
                <input type="hidden" name="qty[]" value="<?=$items['qty']?>">
                <?= $items['name']?>
              </td>
              <td><?= $items['seni']?></td>
              <td><?= $items['qty']?></td>
              <td>Rp. <?= $items['price']?></td>
              <td>Rp. <?= $items['subtotal']?></td>
              <td>
                <a class="btn btn-danger" href="<?=base_url('index.php/Cart/del/'.$items['rowid'])?>" onclick="return confirm('Yakin Untuk Menghapus?')">Del</a>
              </td>
            </tr>
            <?php
            }
            ?>
             <tr>
              <input type="hidden" name="qty" value="<?=$this->cart->total_items()?>">
              <td>Total Jumlah</td>
              <td></td>
              <td><?= $this->cart->total_items()?></td>
              <td colspan="3"></td>
            </tr>
            <tr>
              <input type="hidden" name="grand_total" value="<?=$this->cart->total()?>">
              <td>Total Harga</td>
              <td colspan="3"></td>
              <td>Rp. <?= $this->cart->total()?></td>
              <td></td>
            </tr>
            <tr>
              <td>Jenis Pengiriman:</td>
              <td colspan="2">
                <select class="form-control" name="kirim">
                <option value="COD">COD (Cash On Dilivery)</option>
                <option value="Gosend">Gosend</option>
                <option value="GrabExpress">GrabExpress</option>
              </select>
            </td>
              <td>Alamat:</td>
              <td colspan="2"><textarea name="alamat" class="form-control"><?=$this->session->userdata('alamat');?></textarea></td>
            </tr>
          </table>
          <a href="<?=base_url('index.php/Utama/jualbeli')?>" class="btn btn-info" style="float: left;">Kembali Belanja</a>
          <input type="submit" name="simpan" value="PROSES" class="btn btn-success" style="float: right;">
        </form>
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