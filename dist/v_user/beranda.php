<div id="main">
  <header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
      <i class="bi bi-justify fs-3"></i>
    </a>
  </header>

  <div class="page-heading">
    <h3>Beranda</h3>
    <h5>Halo, <?php  echo $data_nama ?> (
      <?php

      switch ($idLevel) {
        case 'O-pimpinan':
          echo 'Pimpinan Organisasi';
          break;
          
          case 'O-admin':
          echo 'Admin Organisasi';
          break;

        case 'donatur':
          echo 'Donatur';
          break;
        
        case 'perseorangan':
          echo 'Donasi Perseorangan';
          break;

        default:
          # code...
          break;
      }

      ?>
    ) </h5>
</div>
  <?php
              switch ($idLevel) {
                case 'perseorangan':
            ?>
  <div class="page-content">
    <section class="row">
      <div class="col-12 col-lg-12">
        <div class="row">
          <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row">
                  <div class="col-md-4">
                    <div class="stats-icon blue">
                      <i class="iconly-boldProfile"></i>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Program</h6>
                    <h6 class="font-extrabold mb-0">
                      <?php // menghitung
                      $sql_hitung = "SELECT COUNT(id) from program where status ='P' AND idLembaga='$idPengguna'";
                      $q_hit = mysqli_query($con, $sql_hitung);
                      while ($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0] . "";
                      }
                      ?></h6>
                    <a href="?level=perseorangan&page=program" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row">
                  <div class="col-md-4">
                    <div class="stats-icon purple">
                      <i class="iconly-boldShow"></i>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Dana Masuk</h6>

                    <h6 class="font-extrabold mb-0"><?php
                                                      $sql_hitung = "SELECT COUNT(a.id) from transaksi a, program b where a.idProgram=b.id  AND b.idLevel='2' AND a.status ='T' AND b.idLembaga='$idPengguna'";
                                                      $q_hit = mysqli_query($con, $sql_hitung);
                                                      while ($row = mysqli_fetch_array($q_hit)) {
                                                        echo  $row[0] . "";
                                                      }
                                                    ?></h6>
                    <a href="?level=perseorangan&page=transaksi" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        
                                    </div>
                                    <div class="card-body">
                                    <p>
                                      <center>
                                      <br> <font face="Trebuchet MS"><b> Selamat Datang Di </b></font>
                                      <br> <font face="Trebuchet MS"><b> Portal Donasi Peduliku </b></font>
                                      <br> <br><br>
                                      <img src="../../images/landing.png" height="100px" width="350px;" align="center"/>
                                      </center>
                                  </p>
                                    </div>
                                </div>
                            </div>
                        </div>
          <div class="card">
          </div>

        </div>

    </section>
  </div>
  <?php
            break;
            ?>
            <?php
            case 'donatur':
            ?>
            <div class="page-content">
    <section class="row">
      <div class="col-12 col-lg-12">
        <div class="row">
          <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row">
                  <div class="col-md-4">
                    <div class="stats-icon purple">
                      <i class="iconly-boldShow"></i>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Riwayat Donasi</h6>

                    <h6 class="font-extrabold mb-0"><?php
                                                      $sql_hitung = "SELECT COUNT(id) from transaksi where idDonatur='$idPengguna'";
                                                      $q_hit = mysqli_query($con, $sql_hitung);
                                                      while ($row = mysqli_fetch_array($q_hit)) {
                                                        echo  $row[0] . "";
                                                      }
                                                    ?></h6>
                    <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row">
                  <div class="col-md-4">
                    <div class="stats-icon blue">
                      <i class="iconly-boldProfile"></i>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Program</h6>
                    <h6 class="font-extrabold mb-0">
                      <?php // menghitung
                      $sql_hitung = "SELECT COUNT(id) from program where status ='P'";
                      $q_hit = mysqli_query($con, $sql_hitung);
                      while ($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0] . "";
                      }
                      ?></h6>
                    <a href="?page=prog" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        
                                    </div>
                                    <div class="card-body">
                                    <p>
                                      <center>
                                      <br> <font face="Trebuchet MS"><b> Selamat Datang Di </b></font>
                                      <br> <font face="Trebuchet MS"><b> Portal Donasi Peduliku </b></font>
                                      <br> <br><br>
                                      <img src="../../images/landing.png" height="100px" width="350px;" align="center"/>
                                      </center>
                                  </p>
                                    </div>
                                </div>
                            </div>
                        </div>
          <div class="card">
          </div>

        </div>

    </section>
  </div>
  <?php
            break;
                                                }
                                                ?>