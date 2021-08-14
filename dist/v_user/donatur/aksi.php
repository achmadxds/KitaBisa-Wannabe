<?php
  include_once("../../koneksi.php");

  if(isset($_POST['btnSimpanDonasi'])) {
    InserTransaksi();
  } 

  else if(isset($_POST['updateBuktiTransfer'])) {
    UpdateBuktiTransfer(Upload_Invoice('invoicesz'));
  }
?>