<?php
 include_once("../koneksi.php");

 	if (isset($_POST['btnSimpan'])) {
         $date = date('Y-m-d');
		$sql_insert = "INSERT INTO lembaga (kdLembaga, nmLembaga, idJenis, alamat, nmPimpinan, berkas, no_hp, tgl) VALUES (
					'".$_POST['txtKdLembaga']."',
					'".$_POST['txtNmLembaga']."',
					'".$_POST['txtJenis']."',
					'".$_POST['txtAlamat']."',
                    '".$_POST['txtNmPimpinan']."',
                    
                    'NULL',
                    '".$_POST['txtNoHp']."',
                    '$date')";
		$query_insert = mysqli_query($con,$sql_insert) or die (mysqli_connect_error());
		
		if($query_insert) {
            echo "<script>alert('Simpan Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=lembaga'>";
			
		}else{
			echo "<script>alert('Simpan Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=lembaga'>";
		}

    }
elseif(isset ($_POST['btnUBAH'])){
    //mulai proses ubah
    $sql_ubah = "UPDATE lembaga SET
        kdLembaga='".$_POST['txtKdProgram']."',
        nmLembaga='".$_POST['txtNmProgram']."',
        jenis='".$_POST['txtIdLembaga']."',
        alamat='".$_POST['txtKeterangan']."',
        nmPimpinan='".$_POST['txtDonasi']."',
        berkas='".$_POST['txtDonasi']."',
        noHP='".$_POST['txtDonasi']."',
        tgl='".$_POST['txtDonasi']."'
        WHERE id='".$_POST['txtId']."'";
    $query_ubah = mysqli_query($con, $sql_ubah);

    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=lembaga'>";
    }else{
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=lembaga'>";
    }
    //selesai proses ubah

}else{
    //mulai proses hapus
    if(isset($_GET['kode'])){
        $sql_hapus = "DELETE FROM lembaga WHERE id='".$_GET['kode']."'";
        $query_hapus = mysqli_query($con, $sql_hapus);

        if ($query_hapus) {
            echo "<script>alert('Hapus Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=lembaga'>";
        }else{
            echo "<script>alert('Hapus Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=lembaga'>";
        }
    }
    //selesai proses hapus
}

?>
