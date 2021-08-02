<?php
     include_once("../../koneksi.php");
     broadcast();
    if(isset($_GET['kode'])) confirmProg($_GET['kode']);
    
?>

