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
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

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

  <header class="bg-primary text-white text-center pb-4">
  <a href="index.php" style="text-align: left;">
    <img border="0" alt="Peduli-ku" src="images/landing.png" width="300px" height="80px">
    </a>
    <h1 class="text-uppercase pt-5">List Program</h1>
    <div class="text-center">
    </div>
  </header>

  <div class="text-center dropdown pt-5">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Pilih Jenis
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <?php
      include_once('koneksi.php');
      $dt = SelectAlljenis();

      foreach ($dt as $key => $value) {
      ?>
        <a class="dropdown-item" href="<?php echo "?kode=" . $value['id'] ?>"><?php echo $value['nama'] ?></a>
      <?php
      }
      ?>
    </div>
  </div>
  <section class="page-section portfolio" id="portfolio">
    <div class="container">
      <div class="row justify-content-center">
        <?php

        if (isset($_GET['kode'])) {
          $a = GetProgramByJenis($_GET['kode']);
        }

        $c = mysqli_num_rows($a);

        if(mysqli_num_rows($a) > 0) {
          foreach ($a as $key => $value) {
            $presentase = ($value['jumlah'] / $value['donasi']) * 100;
            $makeRounded = round($presentase, 2).'%';
            ?>
              <div class="col-md-6 col-lg-4 mb-5">
                <div class="portfolio-item mx-auto" style="width: 250px; height: 250px;" data-bs-toggle="modal" data-bs-target="#portfolioModal1" onclick="hah(this)" data-id="<?php echo $value['nmProgram'] . "~" . $value['keterangan'] . "~" . $value['donasi'] . "~" .  $value['jumlah'] . "~" . date("d-M-Y", strtotime($value['tgl_akhir'])) ?>">
                  <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                    <div class="portfolio-item-caption-content text-center text-white">
                      <h2><?php echo $value['nmProgram'] ?></h2>
                    </div>
                  </div>
                  <img class="img-fluid" src="images/files/<?php echo $value['gambar'] ?>" alt="..." />
                </div>
                <div class="mt-3">
                  <p class=""><b>Donasi Terkumpul : Rp. <?php echo $value['jumlah'] ?> Dari Rp. <?php echo $value['donasi']?> </b></p>
                  <div class="progress" style="background-color: wheat; width: 85%; display: inline-block;">
                    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $makeRounded ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $makeRounded ?>; background-color: black;">
                      <p style="color:black;">.</p>
                    </div>
                  </div>
                  <p style="display: inline-block;"><?php echo $makeRounded ?></p>
                </div>
              </div>
            <?php
          }
        } else {
          echo '<h1 class="text-center"> HALALAMAN INI KOSONG </h1>';
        }
        ?>
      </div>
    </div>
    </div>
  </section>

  <div class="modal fade" id="portfolioModal1" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body text-center pb-5">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-12">
                <!-- Portfolio Modal - Title-->
                <h2 class="portfolio-modal-title text-secondary pt-3 text-uppercase mb-0">Detail Program</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                  <div class="divider-custom-line"></div>
                </div>
                <div class="row pb-2">
                  <div class="col-6">
                  <label for=""><b>Nama Program</b></label>
                    <textarea style="resize: none;" id="namaP" cols="30" rows="2" class="form-control" readonly></textarea>
                    <br>
                    <!-- <label for=""><b>Keterangan</b></label>
                    <textarea style="resize: none;" id="ketP" cols="30" rows="2" class="form-control" readonly></textarea>
                    <br> -->
                    <label for=""><b>Donasi Sebesar</b></label>
                    <input type="text" class="form-control" id="tujP" readonly />
                  </div>
                  <div class="col-6">

                    <!-- <label for=""><b>Atas Nama</b></label> -->
                    <!-- <input type="text" class="form-control" id="pimpP" readonly /> -->
                    <!-- <textarea style="resize: none;" id="pimpP" cols="30" rows="2" class="form-control" readonly></textarea> -->
                    <label for=""><b>Keterangan</b></label>
                    <textarea style="resize: none;" id="ketP" cols="30" rows="2" class="form-control" readonly></textarea>
                    <br>
                    <label for=""><b>Tanggal Berakhir</b></label>
                    <input type="text" class="form-control" id="tglendP" readonly />
                    <!-- <textarea style="resize: none;" id="tglendP" cols="30" rows="2" class="form-control" readonly></textarea> -->
                    <!-- <br> -->
                    <!-- <label for=""><b>Donasi Terkumpul</b></label>
                    <input type="text" class="form-control" id="ntujP" readonly /> -->
                  </div>
                </div>
                <div class="modal-footer">
                
                <button onclick="location.href='login.php'" class="btn btn-primary">Donasi</button>
									</div>
                <button class="btn btn-primary mt-3" href="#!" data-bs-dismiss="modal">
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>

<script type="text/javascript">
  // var ProgressBar = require('progressbar.js')
  // var line = new ProgressBar.Line('#aaooo')

  function hah(param) {
    let A = $(param).data('id')
    const data = A.split('~')

    $('#namaP').val(data[0])
    $('#ketP').val(data[1])
    $('#tujP').val('Rp. ' + data[2])
    $('#pimpP').val()
    $('#tglendP').val(data[3])
    $('#ntujP').val()
  }
</script>