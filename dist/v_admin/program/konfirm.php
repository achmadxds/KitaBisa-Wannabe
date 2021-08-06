<?php
     include_once("../../koneksi.php");
     broadcast();
    if(isset($_GET['kode'])) confirmProg($_GET['kode']);
    
    echo "<meta http-equiv='refresh' content='0; url=index.php?page=progAcc'>";
?>

