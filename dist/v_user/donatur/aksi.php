<?php
  include_once("../../koneksi.php");

  if(isset($_POST['btnSimpanDonasi'])) {
    InserTransaksi();
    UpdateJumlahDonasi();

    // header('location: ?level=donatur&page=prog&an=1');
    echo '<meta http-equiv="refresh" content="0;url=?level=donatur&page=prog&an=2">';
  }
?>