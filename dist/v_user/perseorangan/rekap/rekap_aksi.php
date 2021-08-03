<?php
  include_once("__DIR__ .  ../../../../koneksi.php");

  switch ($_GET['level']) {
    case 'perseorangan':
      switch ($_GET['tipe']) {
        case 'program':
          $a = $_GET['idUser'];
          $query = "SELECT a.* FROM program a, perseorangan b WHERE a.idLembaga=$a";
          $sql = mysqli_query($con, $query);
          foreach ($sql as $key => $value) {
            echo '<pre>';
            print_r($value);
            echo '</pre>'; 
          }
          break;
        
        case 'donasi':
          $a = $_GET['idUser'];
          break;
      }
      break;
  }
?>