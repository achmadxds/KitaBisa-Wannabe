<?php	
	 include_once("koneksi.php");
    ?>
<div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Beranda</h3>
                
            </div>
            <?php
              switch ($data_status) {
                case 'admin':
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
                                                <h6 class="text-muted font-semibold">Lembaga</h6>

                                                <h6 class="font-extrabold mb-0"><?php // menghitung
                                                  $sql_hitung = "SELECT COUNT(id) from lembaga ";
                                                  $q_hit= mysqli_query($con, $sql_hitung);
                                                  while($row = mysqli_fetch_array($q_hit)) {
                                                      echo  $row[0]."";
                                                  }
                                                  ?></h6>
                                                   <a href="?page=lembaga" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
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
                                                <h6 class="text-muted font-semibold">Program Baru</h6>
                                                <h6 class="font-extrabold mb-0">
                                                  <?php // menghitung
                                                  $sql_hitung = "SELECT COUNT(id) from program where status ='T'";
                                                  $q_hit= mysqli_query($con, $sql_hitung);
                                                  while($row = mysqli_fetch_array($q_hit)) {
                                                      echo  $row[0]."";
                                                  }
                                                  ?></h6>
                                                  <a href="?page=progAcc" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
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
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Donatur</h6>
                                                <h6 class="font-extrabold mb-0">
                                                  <?php
                                                  $sql_hitung = "SELECT COUNT(id) from donatur";
                                                  $q_hit= mysqli_query($con, $sql_hitung);
                                                  while($row = mysqli_fetch_array($q_hit)) {
                                                      echo  $row[0]."";
                                                  }
                                                  ?>
                                                </h6>
                                                <a href="?page=donatur" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
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
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Perseorangan</h6>
                                                <h6 class="font-extrabold mb-0">
                                                <?php
                                                    $sql_hitung = "SELECT COUNT(kdPerseorangan) from perseorangan";
                                                    $q_hit= mysqli_query($con, $sql_hitung);
                                                    while($row = mysqli_fetch_array($q_hit)) {
                                                        echo  $row[0]."";
                                                    }
                                                    ?>
                                                </h6>
                                                <a href="?page=prsg" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                                            </div>
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
                                      <br> <font face="Trebuchet MS"><b> Portal Donasi </b></font>
                                      <br> <font face="Trebuchet MS"><b> Peduli-Ku </b></font>
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
            case 'L-pimpinan' && 'L-admin':
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
                                                  $sql_hitung = "SELECT COUNT(id) from program where status ='P' AND idLembaga='$data_id' AND idLevel='1'";
                                                  $q_hit= mysqli_query($con, $sql_hitung);
                                                  while($row = mysqli_fetch_array($q_hit)) {
                                                      echo  $row[0]."";
                                                  }
                                                  ?></h6>
                                                  <a href="?page=prog" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-6 col-lg-3 col-md-7">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Dana Masuk</h6>
                                                <h6 class="font-extrabold mb-0">
                                                <?php
                                                    $sql_hitung = "SELECT COUNT(a.id) from transaksi a, program b where a.idProgram=b.idLembaga AND b.idLevel='1' AND a.status ='T' AND b.idLembaga='$data_id'";
                                                    $q_hit= mysqli_query($con, $sql_hitung);
                                                    while($row = mysqli_fetch_array($q_hit)) {
                                                        echo  $row[0]."";
                                                    }
                                                    ?>
                                                </h6>
                                                <?php
                                                    if ($data_status == 'L-pimpinan') {
                                                    ?>
                                                    
                                                    <?php
                                                    } elseif ($data_status == 'L-admin') {
                                                    ?>
                                                    <a href="?page=transaksi" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                                                    <?php
                                                    } else {
                                                    ?>
                                                    
                                                </td>
                                                <?php
                                                    } ?>
                                                
                                            </div>
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