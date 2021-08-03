<?php
  include_once("../../koneksi.php");
  session_start();
  if (isset($_SESSION['ses_username'])=="") {
      echo"<meta http-equiv='refresh' content='0;url=../../login.php'>";
  }else{
      $data_username = $_SESSION["ses_username"];
      $data_nama=$_SESSION["ses_nama"];
      $idPengguna=$_SESSION["ses_id"];
      $idLevel = $_SESSION["ses_level"];
  }
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal Peduli-Ku</title>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

  <link rel="stylesheet" href="../assets/vendors/iconly/bold.css">

  <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
  <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="../assets/css/app.css">
  <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
  <div id="app">
    <div id="sidebar" class="active">
      <div class="sidebar-wrapper active">
        <div class="sidebar-header">
          <div class="d-flex justify-content-between">
            <div class="logo">
              <span><img src="./assets/images/logo/dash-1.ico" alt=""></span>
              <a href="index.php">
              Peduli-Ku</a>
            </div>
            <div class="toggler">
              <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
          </div>
        </div>
        <div class="sidebar-menu">
          <ul class="menu">
            <li class="sidebar-title">Menu</li>
            <?php
              switch ($idLevel) {
                case 'donatur':
                  ?>
                    <li class="sidebar-item active ">
                      <a href="?level=donatur&page=beranda" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                      </a>
                    </li>
                    <li class="sidebar-item ">
                      <a href="?level=donatur&page=list" class='sidebar-link'>
                        <i class="bi bi-steam"></i>
                        <span>Data Yayasan</span>
                      </a>
                    </li>
                    <li class="sidebar-item has-sub">
                      <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Donasi Program</span>
                      </a>
                      <ul class="submenu">
                        <li class="submenu-item ">
                          <a href="?level=donatur&page=prog&an=1">Lembaga</a>
                        </li>
                        <li class="submenu-item ">
                          <a href="?level=donatur&page=prog&an=2">Perseorangan</a>
                        </li>
                      </ul>
                    </li>
                    <li class="sidebar-item ">
                      <a href="?level=donatur&page=riwayat" class='sidebar-link'>
                        <i class="bi bi-steam-fill"></i>
                        <span>Riwayat Donasi</span>
                      </a>
                    </li>

                    <li class="sidebar-item "
                      style="background-color: #bf0808; border-radius: 10px; margin-top: 20px; margin-bottom: 20px;">
                      <a class='sidebar-link' data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i style="color: white;" class="bi bi-box-arrow-right"></i>
                        <span style="color: white;">Logout</span>
                      </a>
                    </li>
                  <?php
                  break;
                
                case 'perseorangan':
                  ?>
                    <li class="sidebar-item active ">
                      <a href="?level=perseorangan&page=beranda" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                      </a>
                    </li>
                    
                    <li class="sidebar-item ">
                        <a href="?level=perseorangan&page=program" class='sidebar-link'>
                          <i class="bi bi-steam-fill"></i>
                          <span>Kelola Data Program</span>
                        </a>
                      </li>

                      <li class="sidebar-item ">
                        <a href="?level=perseorangan&page=transaksi" class='sidebar-link'>
                          <i class="bi bi-steam-fill"></i>
                          <span>Transaksi Donasi</span>
                        </a>
                      </li>
                    
                      <li class="sidebar-item ">
                        <a href="?level=perseorangan&page=dana" class='sidebar-link'>
                          <i class="bi bi-steam-fill"></i>
                          <span>Kelola Dana</span>
                        </a>
                      </li>

                      <li class="sidebar-title">Menu Lain</li>

                      <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                          <i class="bi bi-stack"></i>
                          <span>Laporan Administrasi</span>
                        </a>
                        <ul class="submenu ">
                          <li class="submenu-item ">
                            <a href="?level=perseorangan&page=rekapProgram&tipe=program&idUser=<?php echo $_SESSION["ses_id"] ?>">Data Program</a>
                          </li>
                          <li class="submenu-item ">
                            <a href="?level=perseorangan&page=rekapProgram&tipe=donasi&idUser=<?php echo $_SESSION["ses_id"] ?>">Data Donasi</a>
                          </li>
                        </ul>
                      </li>

                    
                    <li class="sidebar-item "
                      style="background-color: #bf0808; border-radius: 10px; margin-top: 20px; margin-bottom: 20px;">
                      <a class='sidebar-link' data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i style="color: white;" class="bi bi-box-arrow-right"></i>
                        <span style="color: white;">Logout</span>
                      </a>
                    </li>
                  <?php
                  break;
              }
            ?>
            </div>
              <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

      </div>

      <div class="content-wrapper">
        <div class="container-fluid">
        <?php
          if(isset($_GET['level'])) {
            switch ($_GET['level']) {
              case 'donatur':
                switch ($_GET['page']) {
                  case 'beranda':
                    include "beranda.php";
                    break;
                  
                  case 'list':
                    include "donatur/list_yayasan.php";
                    break;

                  case 'prog' :
                    include "donatur/donasi_program.php";
                    break;

                  case 'aksiTambah':
                    include "donatur/aksi.php";
                    break;
    
                  case 'riwayat':
                    include "donatur/riwayat_donasi.php";
                    break;
                }
                break;
              
              case 'perseorangan':
                switch ($_GET['page']) {
                  case 'beranda':
                    include "beranda.php";
                    break;

                  case 'program':
                    include "perseorangan/program/program_view.php";
                    break;

                  case 'programEdit':
                    include "perseorangan/program/program_edit.php";
                    break;

                  case 'programSave':
                    include "perseorangan/program/program_aksi.php";
                  break;

                  case 'programDetail':
                    include "perseorangan/program/program_detail.php";
                  break;

                  case 'transaksi':
                    include "perseorangan/transaksi/transaksi_view.php";
                  break;
                  
                  case 'confirm' :
                    include "perseorangan/transaksi/transaksi_confirm.php";
                    break;

                  case 'dana':
                    include "perseorangan/dana/dana_view.php";
                  break;

                  case 'rekapProgram':
                    include "perseorangan/rekap/rekap_view.php";
                    break;
                }
                break;
            }
          } else {
            include "beranda.php";
          }
        ?>
        </div>
      </div>
    </div>
  </div>
    
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Keluar?</h5>
          <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih Log Out Jika ingin keluar.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../../login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendors/apexcharts/apexcharts.js"></script>
  <script src="../assets/js/pages/dashboard.js"></script>
  <script src="../assets/js/main.js"></script>
  <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendors/simple-datatables/simple-datatables.js"></script>
</body>

</html>