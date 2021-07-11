<?php
include_once("koneksi.php");

session_start();
if (isset($_SESSION['ses_username']) == "") {
  echo "<meta http-equiv='refresh' content='0;url=.../../loginAdmin.php'>";
  
} else {
  $data_username = $_SESSION["ses_username"];
  $data_nama = $_SESSION["ses_nama"];
  $data_id = $_SESSION["ses_id"];
  $data_status = $_SESSION["ses_level"];
  $data_pengguna = $_SESSION["ses_idYayasan"];
}

?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal Donasi-Ku</title>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/bootstrap.css">

  <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

  <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
  <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/app.css">
  <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
  <div id="app">
    <div id="sidebar" class="active">
      <div class="sidebar-wrapper active">
        <div class="sidebar-header">
          <div class="d-flex justify-content-between">
            <div class="logo">
              <span><img src="./assets/images/logo/dash-1.ico" alt=""></span>
              <a href="index.html"><img src="assets/images/logo/zen.png" alt="Logo" srcset=""></a>
            </div>
            <div class="toggler">
              <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
          </div>
        </div>
        <div class="sidebar-menu">
          <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item active ">
              <a href="?page=beranda" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <?php
                        if ($data_status=="0"){
                          ?>
            <li class="sidebar-item ">
              <a href="?page=jenis" class='sidebar-link'>
                <i class="bi bi-steam-fill"></i>
                <span>Master Jenis</span>
              </a>
            </li>

            <li class="sidebar-item ">
              <a href="?page=progAcc" class='sidebar-link'>
                <i class="bi bi-steam-fill"></i>
                <span>Kelola Data Program</span>
              </a>
            </li>

            <li class="sidebar-item ">
              <a href="?page=lembaga" class='sidebar-link'>
                <i class="bi bi-steam-fill"></i>
                <span>Data Lembaga Terdaftar</span>
              </a>
            </li>

            <li class="sidebar-item ">
              <a href="?page=prsg" class='sidebar-link'>
                <i class="bi bi-steam-fill"></i>
                <span>Data Perseorangan</span>
              </a>
            </li>

            <li class="sidebar-title">Menu Master</li>

            <li class="sidebar-item  has-sub">
              <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Kelola Data Pengguna</span>
              </a>
              <ul class="submenu ">
                <li class="submenu-item ">
                  <a href="?page=super">Super User</a>
                </li>
                <li class="submenu-item ">
                  <a href="?page=usrPrg">Perseorangan</a>
                </li>
              </ul>
              <?php
          }elseif ($data_status=="1"){
            ?>
            <li class="sidebar-item ">
              <a href="?page=prog" class='sidebar-link'>
                <i class="bi bi-steam-fill"></i>
                <span>Kelola Data Program</span>
              </a>
            </li>

            <li class="sidebar-item ">
              <a href="?page=donatur" class='sidebar-link'>
                <i class="bi bi-steam-fill"></i>
                <span>Kelola Donatur</span>
              </a>
            </li>

            <li class="sidebar-title">Menu Master</li>

            <li class="sidebar-item ">
              <a href="?page=#" class='sidebar-link'>
                <i class="bi bi-steam-fill"></i>
                <span>Laporan Donasi</span>
              </a>
            </li>

            <li class="sidebar-item  has-sub">
              <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Laporan Administrasi</span>
              </a>
              <ul class="submenu ">
                <li class="submenu-item ">
                  <a href="?page=super">Dana</a>
                </li>
                <li class="submenu-item ">
                  <a href="?page=usrPrg">Data Donatur</a>
                </li>
              </ul>
              <?php
          }elseif ($data_status=="2"){
            ?>
            <li class="sidebar-item ">
              <a href="?page=prog" class='sidebar-link'>
                <i class="bi bi-steam-fill"></i>
                <span>Kelola Data Program</span>
              </a>
            </li>

            <li class="sidebar-item ">
              <a href="?page=progAcc" class='sidebar-link'>
                <i class="bi bi-steam-fill"></i>
                <span>Kelola Data Program</span>
              </a>
            </li>

            <li class="sidebar-item ">
              <a href="?page=donatur" class='sidebar-link'>
                <i class="bi bi-steam-fill"></i>
                <span>Data Donatur</span>
              </a>
            </li>

            <li class="sidebar-item ">
              <a href="?page=#" class='sidebar-link'>
                <i class="bi bi-steam-fill"></i>
                <span>Kelola Dana</span>
              </a>
            </li>

            <li class="sidebar-item ">
              <a href="?page=user" class='sidebar-link'>
                <i class="bi bi-steam-fill"></i>
                <span>Data User Donatur</span>
              </a>
            </li>

            <li class="sidebar-title">Menu Master</li>

            <li class="sidebar-item  has-sub">
              <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Laporan Administrasi</span>
              </a>
              <ul class="submenu ">
                <li class="submenu-item ">
                  <a href="?page=#">Dana</a>
                </li>
                <li class="submenu-item ">
                  <a href="?page=#">Data Donatur</a>
                </li>
                <?php
                          }
                          ?>
                <li class="sidebar-item "
                  style="background-color: #bf0808; border-radius: 10px; margin-top: 20px; margin-bottom: 20px;">
                  <a href="/login.html" class='sidebar-link'>
                    <i style="color: white;" class="bi bi-box-arrow-right"></i>
                    <span style="color: white;">Logout</span>
                  </a>
                </li>
              </ul>
        
              </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        </div>
        <div class="content-wrapper">
          <div class="container-fluid">
            <!-- Menjadikan halaman web dinamis, 
                dengan menjadikan halaman lain yang dipanggil sebagai sebuah konten dari index.php-->
            <?php
        if (isset($_GET['page'])) {
          $hal = $_GET['page'];

          switch ($hal) {
            case 'beranda':
              include "beranda.php";
              break;
            case 'try' :
              include "c.php";
              break;
            
            case 'prog' :
              include "program/tampil.php";
              break;
            case 'progAcc':
              include "program/accept.php";
              break;
            case 'progUbah' :
              include "program/ubah.php";
              break;
            case 'progAksi' :
              include "program/aksi.php";
              break;
            case 'progKonfirm' :
              include "program/konfirm.php";
              break;
            case 'progDet' :
              include "program/detail.php";
              break;
            case'progArchive' :
              include "program/arsip.php";
              break;
            
            case 'donatur' :
              include "donatur/tampil.php";
              break;
            case 'donUbah' :
              include "donatur/ubah.php";
              break;
            case 'donAksi' :
              include "donatur/aksi.php";
              break;

            case 'lembaga':
              include "lembaga/tampil.php";
              break;
            case 'lembUbah':
              include "lembaga/ubah.php";
              break;
            case 'lembAksi' :
              include "lembaga/aksi.php";
              break;

            case 'prsg' :
              include "perseorangan/view.php";
              break;
            case 'prsgUbah' :
              include "perseorangan/ubah.php";
              break;
            case 'prsgAksi' :
              include "perseorangan/aksi.php";
              break;
            case 'prsgDet' :
              include "perseorangan/detail.php";
              break;
            case 'konfirmed' :
              include "perseorangan/acc.php";
              break;

            case 'jenis' :
              include "jenis/view.php";
              break;
            case 'jnsUbah' :
              include "jenis/ubah.php";
              break;
            case 'jnsAksi' :
              include "jenis/aksi.php";
              break;

            case 'super' :
              include "superUser/tampil.php";
              break;
            case 'supUbah' :
              include "superUser/ubah.php";
              break;
            case 'supAksi' :
              include "superUser/aksi.php";
              break;

            case 'user' :
              include "user/tampil.php";
              break;
            case 'usrUbah' :
              include "user/ubah.php";
              break;
            case 'usrAksi' :
              include "user/aksi.php";
              break;

            case 'usrPrg' :
              include "userPsg/tampil.php";
              break;
            case 'usrPrgUbah' :
              include "userPsg/ubah.php";
              break;
            case 'usrPrgAksi' :
              include "userPsg/aksi.php";
            
          }
        } else {
          include "beranda.php";
        }
        ?>
          </div>
        </div>
        <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>

        <script src="assets/vendors/apexcharts/apexcharts.js"></script>
        <script src="assets/js/pages/dashboard.js"></script>
        <script src="assets/js/main.js"></script>
</body>

</html>