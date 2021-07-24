<?php
    include_once("koneksi.php");
    session_start();
    if (isset($_SESSION['ses_username'])=="") {
        echo"<meta http-equiv='refresh' content='0;url=../../login.php'>";
    }else{
        $data_username = $_SESSION["ses_username"];
        $data_nama=$_SESSION["ses_nama"];
        $idPengguna=$_SESSION["ses_id"];
        // $data_status = $_SESSION["ses_level"];
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
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">

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
              Donasi-Ku</a>
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
            <li class="sidebar-item ">
              <a href="?page=jenis" class='sidebar-link'>
                <i class="bi bi-steam-fill"></i>
                <span>Data Yayasan</span>
              </a>
            </li>
            <li class="sidebar-item ">
              <a href="?page=prog" class='sidebar-link'>
                <i class="bi bi-steam-fill"></i>
                <span>Donasi Program</span>
              </a>
            </li>

            <li class="sidebar-item ">
              <a href="?page=donatur" class='sidebar-link'>
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
<!-- 
                <li>
                  <a class='sidebar-link' data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-sign-out"></i> <span>Logout</span></a>
                </li>
              </ul>
         -->
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
            
            case 'prog' :
              include "prog/view.php";
              break;
            case 'progDet' :
              include "program/detail.php";
              break;

            case 'lembaga':
              include "lembaga/tampil.php";
              break;

          }
        } else {
          include "beranda.php";
        }
        ?>
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
            <a class="btn btn-primary" href="../../loginAdmin.php">Logout</a>
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
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
</body>

</html>