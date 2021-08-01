<?php
include_once("koneksi.php");
    if (isset($_POST['btnSimpan'])) {
      $sql_insert = "INSERT INTO mst_jenis (nama) VALUES (
            '".$_POST['txtJenis']."')";
      $query_insert = mysqli_query($con,$sql_insert) or die (mysqli_connect_error());
      
      if($query_insert) {
              echo "<script>alert('Simpan Berhasil')</script>";
              echo "<meta http-equiv='refresh' content='0; url=index.php?page=jenis'>";
        
      }else{
        echo "<script>alert('Simpan Gagal')</script>";
              echo "<meta http-equiv='refresh' content='0; url=index.php?page=jenis'>";
      }

    //selesai proses ubah
    
}elseif (isset($_POST['btnUBAH'])) {
	//mulai proses ubah
	$sql_ubah = "UPDATE mst_jenis SET
        nama ='" . $_POST['txtNama'] . "'
        WHERE id ='" . $_POST['txtId'] . "'";
	$query_ubah = mysqli_query($con, $sql_ubah);

	if ($query_ubah) {
		echo "<script>alert('Ubah Berhasil')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php?page=jenis'>";
	} else {
		echo "<script>alert('Ubah Gagal')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php?page=jenis'>";
	}
	//selesai proses ubah

} 
else{
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
