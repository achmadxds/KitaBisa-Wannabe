<?php
include_once("__DIR__ .  ../../../../koneksi.php");

if(isset($_GET['idKode']) && isset($_GET['jumlahs'])) {
  insertKelolaDana($_GET['idKode'], $_GET['jumlahs']);
  // header('location: ?page=dana');
  echo "<meta http-equiv='refresh' content='0; url=index.php?level=perseorangan&page=dana'>";
} 