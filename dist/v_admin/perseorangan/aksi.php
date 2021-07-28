<?php
include_once("../koneksi.php");
    if (isset($_POST['btnUBAH'])) {
      $sql_ubah = "UPDATE perseorangan SET
          nama='".$_POST['txtNm']."',
          jekel='".$_POST['txtJenis']."',
          alamat='".$_POST['txtAlamat']."',
          no_hp='".$_POST['txtNoHp']."',
          no_rek='".$_POST['txtNoRek']."'
          WHERE id='".$_POST['txtId']."'";
      $query_ubah = mysqli_query($con, $sql_ubah);

      if ($query_ubah) {
          echo "<script>alert('Ubah Berhasil')</script>";
          echo "<meta http-equiv='refresh' content='0; url=index.php?page=prsg'>";
      }else{
          echo "<script>alert('Ubah Gagal')</script>";
          echo "<meta http-equiv='refresh' content='0; url=index.php?page=prsg'>";
      }

    //selesai proses ubah
    
}else{
  //mulai proses hapus
  if(isset($_GET['kode'])){
    $sql_hapus = "DELETE FROM perseorangan WHERE id='".$_GET['kode']."'";
    $query_hapus = mysqli_query($con, $sql_hapus);

    if ($query_hapus) {
        echo "<script>alert('Hapus Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=prsg'>";
    }else{
        echo "<script>alert('Hapus Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=prsg'>";
    }
}
  //selesai proses hapus
}

?>
