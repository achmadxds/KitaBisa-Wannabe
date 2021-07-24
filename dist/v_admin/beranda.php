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
                <?php
                echo $data_id;
                ?>
            </div>
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
                                                <h6 class="text-muted font-semibold">Program</h6>
                                                <h6 class="font-extrabold mb-0">
                                                  <?php // menghitung
                                                  $sql_hitung = "SELECT COUNT(id) from program where status ='P'";
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
                                                    $sql_hitung = "SELECT COUNT(kdPerseorangan) from perseorangan a, user b where b.id=a.id AND b.status ='Aktif'";
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
                                      <br> <font face="Courier new"> Portal Donasi Lembaga </font>
                                      <br> <font face="Courier new">Se-Kabupaten Kudus</font>
                                      <br> <br><br>
                                      <img src="../images/donasi.jpg" height="200px" width="350px;" align="center"/>
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