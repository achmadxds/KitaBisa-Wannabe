<?php
  include_once("../../koneksi.php");

  if(isset($_POST['btnSimpanDonasi'])) {
    InserTransaksi();
  } 

  if(isset($_POST['updateBuktiTransfer'])) {
    UpdateBuktiTransfer();
  }
?>