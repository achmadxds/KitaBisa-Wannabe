<?php
 include_once("../koneksi.php");

 	if(isset ($_POST['btnUBAH'])){
    //mulai proses ubah
    $sql_ubah = "UPDATE user SET
        username='".$_POST['txtNm']."',
        password='".$_POST['txtPassword']."'
        WHERE id='".$_POST['txtId']."'";
    $query_ubah = mysqli_query($con, $sql_ubah);

    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=usrPrg'>";
    }else{
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=usrPrg'>";
    }
    //selesai proses ubah

}else{
    //mulai proses hapus
    if(isset($_GET['kode'])){
      $sql_arsip = "UPDATE user SET status = 'Aktif' where id = '".$_GET['kode']."'";
          $query_arsip = mysqli_query($con, $sql_arsip);
  
              if ($query_arsip) {
                  echo "<script>alert('Akun Diaktifkan')</script>";
                  echo "<meta http-equiv='refresh' content='0; url=?page=usrPrg'>";
              }else{
                  echo "<script>alert('Akun Gagal Diaktifkan')</script>";
                  echo "<meta http-equiv='refresh' content='0; url=?page=usrPrg'>";
              }
          }
    //selesai proses hapus
}

?>
