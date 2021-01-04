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
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#home">Home</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#exhibition">Exhibition</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#buysell">Buy & Sell</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Meet Team</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead" style="background-image: url(<?= base_url()?>assets/img/header-bg.jpg); height: 900px;">
      <div class="container">
        <div class="masthead-subheading">Welcome To EJ-Galleria</div>
        <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
        <a class="btn btn-info btn-xl text-uppercase js-scroll-trigger" href="#home">See More</a>
      </div>
    </header>
    <!-- Services-->
    <section class="page-section" id="home">
      <div class="container">
        <div class="text-center">
          <h2 class="section-heading text-uppercase">Apa itu EJ-Galleria?</h2>
          <h3 class="section-subheading text-muted">
          <?php
          $this->load->view($konten);
          ?>
          
          </h3>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-info"></i>
              <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="my-3">Buy & Sell Arts</h4>
            <p class="text-muted">Anda dapat membeli beberapa karya seni milik orang lain dan menjual karya seni milik anda sendiri disini.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-info"></i>
              <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="my-3">Exhibition Online</h4>
            <p class="text-muted">Pameran seni yang diadakan secara online yang dapat dilihat melalui aplikasi berbasis website.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-info"></i>
              <i class="fas fa-image fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="my-3">Show Off Your Art</h4>
            <p class="text-muted">Daftarkan karya seni anda agar dapat ditampilkan di pameran-pameran yang ada (Harap hubungi admin).</p>
          </div>
        </div>
      </div>
    </section>
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="exhibition">
      <div class="container">
        <div class="text-center">
          <h2 class="section-heading text-uppercase">Exhibition</h2>
          <h3 class="section-subheading text-muted">Galeri pameran seni dari tahun ke tahun</h3>
        </div>
        <div class="row" align="center">
          <?php
          foreach ($tampil_pameran as $pameran) {
          ?>
          <div class="col-lg-4 col-sm-6 col-6 mb-4">
            <div class="portfolio-item">
              <a class="portfolio-link" href="<?= base_url('index.php/Utama/detail_pameran/'.$pameran->id_pameran)?>">
                <img class="img-fluid" src="<?=base_url()?>assets/img/portfolio/<?= $pameran->cover;?>" alt="" />
              </a>
              <div class="portfolio-caption">
                <div class="portfolio-caption-heading"><?= $pameran->nama_pameran;?></div>
                <div class="portfolio-caption-subheading text-muted"><?= Tanggal($pameran->tahun);?></div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>
    <!-- BuynSell-->
    <section class="page-section" id="buysell">
      <div class="container">
        <div class="text-center">
          <h2 class="section-heading text-uppercase">Buy & Sell Arts</h2>
          <h3 class="section-subheading text-muted">Anda dapat membeli beberapa karya seni dan menjual karya seni anda disini.<p>Harap login dahulu sebelum melanjutkan</h3>
          </div>
          <div class="row" align="center">
            <div class="col-lg-4 col-sm-6 mb-4">
              <div class="portfolio-item">
                <img class="img-fluid" src="<?= base_url()?>assets/img/portfolio/oil2.jpg" alt="" />
                <div class="portfolio-caption">
                  <div class="portfolio-caption-heading">Ilustrasi</div>
                  <div class="portfolio-caption-subheading text-muted">Gambar-gambar petunjuk untuk memberikan konteks lebih terhadap penjelasan teks</div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
              <div class="portfolio-item">
                <img class="img-fluid" src="<?= base_url()?>assets/img/portfolio/rupa.jpg" alt="" />
                <div class="portfolio-caption">
                  <div class="portfolio-caption-heading">Patung</div>
                  <div class="portfolio-caption-subheading text-muted">seni yang diperuntukan untuk mengilustrasikan sesuatu, seperti patung manusia zaman purba di museum, dll.</div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
              <div class="portfolio-item">
                <img class="img-fluid" src="<?= base_url()?>assets/img/portfolio/kriya.jpg" alt="" />
                <div class="portfolio-caption">
                  <div class="portfolio-caption-heading">Kriya</div>
                  <div class="portfolio-caption-subheading text-muted">Kerajinan tangan yang memerlukan keterampilan tinggi untuk membuatnya.</div>
                </div>
              </div>
            </div>
            <div class="container">
              <?php if($this->session->userdata('login')!=TRUE)
              {
              ?><a class="btn btn-info btn-xl" href="<?=base_url('index.php/utama/login')?>">Login</a><?php
              }
              else{
              ?><a href="<?= base_url('index.php/Utama/jualbeli')?>" class="btn btn-info btn-xl">Lanjutkan</a><?php
              }?>
            </div>
          </div>
        </section>
        <!-- Contact-->
        <section class="page-section" id="contact">
          <div class="container">
            <div class="text-center">
              <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
              <h3 class="section-subheading text-muted">&nbsp;</h3>
            </div>
            <div class="row">
              <div class="col-lg-3">
                <div class="team-member">
                  <img class="mx-auto rounded-circle" src="<?= base_url()?>assets/img/team/bagus.jpg" alt="" />
                  <h4 class="text-muted">Bagus Setiawan</h4>
                  <p class="text-muted">Leader</p>
                  <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                  <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                  <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-instagram"></i></a>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="team-member">
                  <img class="mx-auto rounded-circle" src="<?= base_url()?>assets/img/team/fahri.jpg" alt="" />
                  <h4 class="text-muted">Fahri</h4>
                  <p class="text-muted">Software Tester</p>
                  <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                  <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                  <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-instagram"></i></a>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="team-member">
                  <img class="mx-auto rounded-circle" src="<?= base_url()?>assets/img/team/yoga.jpg" alt="" />
                  <h4 class="text-muted">Yoga</h4>
                  <p class="text-muted">Designer</p>
                  <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                  <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                  <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-instagram"></i></a>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="team-member">
                  <img class="mx-auto rounded-circle" src="<?= base_url()?>assets/img/team/sendy.jpg" alt="" />
                  <h4 class="text-muted">Sendy Iven Y</h4>
                  <p class="text-muted">Software Developer</p>
                  <a class="btn btn-dark btn-social mx-2" href="https://github.com/sendy452"><i class="fab fa-github"></i></a>
                  <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/sensndy/"><i class="fab fa-instagram"></i></a>
                  <a class="btn btn-dark btn-social mx-2" href="https://gitlab.com/sendyivenyulian"><i class="fab fa-gitlab"></i></a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Sekumpulan mahasiswa gabut dari Politeknik Negeri Jember Angkatan 19 dan seluruh tim adalah mahasiswa Jurusan TI Program Studi Manajamen Informasi.</p></div>
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