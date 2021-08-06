<?php
include_once("__DIR__ .  ../../../../koneksi.php");
sendTransaksi();
// ConfirmTransaksiDonasi($id);
if (isset($_GET['kode'])){
  ConfirmTransaksiDonasi($_GET['kode']);
  UpdateJumlahDonasi($_GET['idProgram'], $_GET['postVal']);
}  
// if (isset($_GET['kode'])) ConfirmTransaksiDonasi($_GET['kode']);
