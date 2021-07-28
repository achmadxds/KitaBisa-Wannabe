<?php
  include_once("../../koneksi.php");

  if(isset($_GET['idKode']) && isset($_GET['jumlahs'])) {
    insertKelolaDana($_GET['idKode'], $_GET['jumlahs']);
    // header('location: ?page=dana');
    echo '<meta http-equiv="refresh" content="0;url=?page=dana">';
  }
?>