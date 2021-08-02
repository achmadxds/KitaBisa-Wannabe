<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Donasi-Ku</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet" />
</head>

<style>
  #aaooo {
    margin: 20px;
    width: 400px;
    height: 8px;
    position: relative;
  }
</style>

<body id="page-top">
  <div id="aaooo"> </div>
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="#page-top">Donasi-Ku</a>
      <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto">
          <div class="dropdown">
            <li class="nav-item mx-0 mx-lg-1" data-bs-toggle="dropdown"><a href="javascript:void(0)" class="nav-link py-3 px-0 px-lg-3 rounded">Program</a></li>
            <div class="dropdown-menu">
              <?php
                include_once('koneksi.php');
                $dt = SelectAlljenis();

                foreach ($dt as $key => $value) {
                  ?>
                    <a class="dropdown-item" href="<?php echo "indexByJenis.php?kode=" . $value['id'] ?>"><?php echo $value['nama'] ?></a>  
                  <?php
                }
              ?>
            </div>
          </div>
          <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" data-bs-toggle="modal" data-bs-target="#exampleModal" href="javascript:void(0)">Daftar</a></li>
          <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="login.php">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Masthead-->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
      <!-- Masthead Avatar Image-->
      <img class="masthead-avatar mb-5" src="assets/img/avataaars.svg" alt="..." />
      <!-- Masthead Heading-->
      <h1 class="masthead-heading text-uppercase mb-0">Selamat Datang</h1>
      <h1 class="masthead-heading text-uppercase mb-0">Portal Donasi Yayasan Kabupaten Kudus</h1>
      <!-- Icon Divider-->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
        <div class="divider-custom-line"></div>
      </div>
      <!-- Masthead Subheading-->
      <p class="masthead-subheading font-weight-light mb-0">Bantu Saudara Kita untuk meringankan beban mereka</p>
    </div>
  </header>
  <!-- Portfolio Section-->
  <section class="page-section portfolio" id="portfolio">
    <div class="container">
      <!-- Portfolio Section Heading-->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Daftar Program</h2>
      <!-- Icon Divider-->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
        <div class="divider-custom-line"></div>
      </div>
      <!-- Portfolio Grid Items-->
      <div class="row justify-content-center">
        <!-- Portfolio Item 1-->
        <?php
        include_once('koneksi.php');

        $a = ShowProgramPublish();

        foreach ($a as $key => $value) {
        ?>
          <div class="col-md-6 col-lg-4 mb-5">
            <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
              <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                <div class="portfolio-item-caption-content text-center text-white">
                  <h2><?php echo $value['nmProgram'] ?></h2>
                </div>
              </div>
              <img class="img-fluid" src="images/files/<?php echo $value['gambar'] ?>" alt="..." />
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </section>
  <!-- About Section-->
  <section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">
      <!-- About Section Heading-->
      <h2 class="page-section-heading text-center text-uppercase text-white">Syarat & Ketentuan</h2>
      <!-- Icon Divider-->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
        <div class="divider-custom-line"></div>
      </div>
      <!-- About Section Content-->
      <div class="row">
        <div class="col-lg-4 ms-auto">
          <p class="lead">
          <h3><b>Donasi Individu</b></h3>
          <ul>
            <li></i> KTP</li>
            <li></i> NPWP (Bila ada)</li>
            <li></i> Nomor Rekening Penerima</li>
            <li></i> Akte Kelahiran / Kartu Keluarga (apabila penerima manfaat adalah anak)</li>
            <li></i> Rekam Medis (dibutuhkan apabila penggalangan dana kesehatan)</li>
            <li></i> Nomor Telepon selular aktif</li>
            <li></i> Foto diri sambil memegang KTP</li>
          </ul>
          </p>
        </div>
        <div class="col-lg-4 me-auto">
          <p class="lead">
          <h3><b>Donasi Lembaga</b></h3>
          <ul>
            <li></i> Akta Pendirian Organisasi</li>
            <li></i> SK Kemenkumham</li>
            <li></i> NPWP Badan</li>
            <li></i> KTP Penanggung Jawab</li>
            <li></i> Nomor Rekening atas nama badan</li>
            <li></i> Tanda Daftar Yayasan</li>
            <li></i> Surat Keterangan Domisili</li>
            <li></i> Struktur Organisasi</li>
            <li></i> Izin Khusus (Bila Ada)</li>
            <li></i> Foto diri penanggung jawab dengan memegang KTP</li>
            <li></i> Surat Kuasa (apabila penanggung jawab bukan ketua Yayasan)</li>
          </ul>
          </p>
        </div>
      </div>
      <!-- About Section Button-->

    </div>
  </section>
  
  <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
        <div class="modal-body text-center pb-5">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title-->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Log Cabin</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Modal - Image-->
                <img class="img-fluid rounded mb-5" src="assets/img/portfolio/cabin.png" alt="..." />
                <!-- Portfolio Modal - Text-->
                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                <button class="btn btn-primary" href="#!" data-bs-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close Window
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row justify-content-center text-center">
            <!-- Portfolio Item 1-->
            <div class="col-md-6 col-lg-7 mb-2 mt-3">
              <div class="portfolio-item mx-auto">
                <a href="register.php" class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                  <img class="img-fluid" src="assets/img/portfolio/cabin.png" alt="Donatur" />
                </a>
                <h4>Donatur</h4>
                <br>
                <a href="perseorangan.php" class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                  <img class="img-fluid" src="assets/img/portfolio/cabin.png" alt="Perseorangan" />
                </a>
                <h4>PERSEORANGAN</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
  <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
  <!-- * *                               SB Forms JS                               * *-->
  <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
  <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
  <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>

<script type="text/javascript">
  var ProgressBar = require('progressbar.js')
  var line = new ProgressBar.Line('#aaooo')
</script>