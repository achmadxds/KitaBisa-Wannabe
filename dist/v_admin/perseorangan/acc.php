<?php
     include_once("../koneksi.php");
    if(isset($_GET['kode'])){
    $sql_arsip = "UPDATE user SET status = 'Aktif' where id = '".$_GET['kode']."'";
        $query_arsip = mysqli_query($con, $sql_arsip);

            if ($query_arsip) {
                echo "<script>alert('Konfirmasi Berhasil')</script>";
                echo "<meta http-equiv='refresh' content='0; url=?page=usrPrg'>";
            }else{
                echo "<script>alert('konfirmasi Gagal')</script>";
                echo "<meta http-equiv='refresh' content='0; url=?page=usrPrg'>";
            }
        }
?>