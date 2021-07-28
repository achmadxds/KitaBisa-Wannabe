<?php
 include_once("../koneksi.php");

 	if(isset ($_POST['btnUBAH'])){
    //mulai proses ubah
    $sql_ubah = "UPDATE donatur SET
        nama='".$_POST['txtNama']."',
        jekel='".$_POST['txtJekel']."',
        alamat='".$_POST['txtAlamat']."',
        no_hp='".$_POST['txtNoHP']."',
        status='".$_POST['txtStatus']."'
        WHERE id='".$_POST['txtId']."'";
    $query_ubah = mysqli_query($con, $sql_ubah);

    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=donatur'>";
    }else{
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=donatur'>";
    }
    //selesai proses ubah

}else{
    //mulai proses hapus
    if(isset($_GET['kode'])){
        $sql_hapus = "DELETE FROM donatur WHERE id='".$_GET['kode']."'";
        $query_hapus = mysqli_query($con, $sql_hapus);

        if ($query_hapus) {
            echo "<script>alert('Hapus Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=donatur'>";
        }else{
            echo "<script>alert('Hapus Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=donatur'>";
        }
    }
    //selesai proses hapus
}

?>
