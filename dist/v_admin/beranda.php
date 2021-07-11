<?php	
	 include_once("../koneksi.php");
    ?>

<div class="form-group">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Beranda
        <small>Portal BKK SMK Ma'arif</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
 <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php // menghitung
                    $sql_hitung = "SELECT COUNT(id) from lembaga ";
                    $q_hit= mysqli_query($con, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0]."";
                    }
                    ?></h3>

              <p>Lembaga</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="?page=lembaga" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php // menghitung
                    $sql_hitung = "SELECT COUNT(id) from program where status ='P'";
                    $q_hit= mysqli_query($con, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0]."";
                    }
                    ?>
                    </h3>

              <p>Program</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="?page=prog" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php // menghitung
                    $sql_hitung = "SELECT COUNT(id) from donatur";
                    $q_hit= mysqli_query($con, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0]."";
                    }
                    ?></h3>

              <p>Donatur</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="?page=donatur" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-light-blue">
            <div class="inner">
              <h3><?php // menghitung
                    $sql_hitung = "SELECT COUNT(kdPerseorangan) from perseorangan a, user b where b.kdUser=a.kdPerseorangan AND b.status ='Aktif'";
                    $q_hit= mysqli_query($con, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0]."";
                    }
                    ?></h3>

              <p>Perseorangan</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="?prog=prsg" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <p>
          <center>
          <br> <font face="Courier new"> Portal Donasi Lembaga </font>
          <br> <font face="Courier new">Se-Kabupaten Kudus</font>
          <br> <br><br>
          <img src="../images/donasi.jpg" height="200px" width="350px;" align="center"/>
          </center>
      </p>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
          </div>

    </section>

    </section>
    <!-- /.content -->
    
  </div>
 

</section>
<!-- /.content -->

</div>
