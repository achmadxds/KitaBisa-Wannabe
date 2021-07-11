<?php

    if (isset($_POST['btnSimpan'])) {
      $sql_insert = "INSERT INTO mst_jenis (nama, jenis) VALUES (
            '".$_POST['txtJenis']."',
            '".$_POST['txtPil']."')";
      $query_insert = mysqli_query($con,$sql_insert) or die (mysqli_connect_error());
      
      if($query_insert) {
              echo "<script>alert('Simpan Berhasil')</script>";
              echo "<meta http-equiv='refresh' content='0; url=index.php?page=jenis'>";
        
      }else{
        echo "<script>alert('Simpan Gagal')</script>";
              echo "<meta http-equiv='refresh' content='0; url=index.php?page=jenis'>";
      }

    //selesai proses ubah
    
}else{
  //mulai proses hapus
  if(isset($_GET['kode'])){
    $sql_hapus = "DELETE FROM mst_jenis WHERE id='".$_GET['kode']."'";
    $query_hapus = mysqli_query($con, $sql_hapus);

    if ($query_hapus) {
        echo "<script>alert('Hapus Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=jenis'>";
    }else{
        echo "<script>alert('Hapus Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=jenis'>";
    }
}
  //selesai proses hapus
}

?>
