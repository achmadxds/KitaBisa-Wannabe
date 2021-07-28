<?php
  include_once("../../koneksi.php");

  if(isset($_POST['btnSimpanDonasi'])) {
    InserTransaksi();

    header('location: ?level=donatur&page=prog');
  }
?>