<?php
  include_once("../../koneksi.php");

  if(isset($_POST['btnUpdateStatusTransaksi'])) {
    UpdateStatusTransaksi();

    // header('location: ?page=transaksi');
  }
?>