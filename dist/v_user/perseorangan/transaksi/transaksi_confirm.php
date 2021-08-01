<?php
include_once("__DIR__ .  ../../../../koneksi.php");
if (isset($_GET['kode'])) ConfirmTransaksiDonasi($_GET['kode']);
