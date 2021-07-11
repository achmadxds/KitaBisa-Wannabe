<?php
include_once("../koneksi.php");

if (isset($_POST['btnSimpan'])) {
	$date = date('Y-m-d');
	$sql_insert = "INSERT INTO lembaga (kdLembaga, nmLembaga, idJenis, alamat, nmPimpinan, berkas, no_hp, no_rek,tgl) VALUES (
					'" . $_POST['txtKdLembaga'] . "',
					'" . $_POST['txtNmLembaga'] . "',
					'" . $_POST['txtJenis'] . "',
					'" . $_POST['txtAlamat'] . "',
                    '" . $_POST['txtNmPimpinan'] . "',
                    '".uploadFiles()."',
                    '" . $_POST['txtNoHp'] . "',
                    '" . $_POST['txtRekening'] . "',
                    '$date')";
	$query_insert = mysqli_query($con, $sql_insert) or die(mysqli_connect_error());

	if ($query_insert) {
		echo "<script>alert('Simpan Berhasil')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php?page=lembaga'>";
	} else {
		echo "<script>alert('Simpan Gagal')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php?page=lembaga'>";
	}
} elseif (isset($_POST['btnUBAH'])) {
	//mulai proses ubah
	$sql_ubah = "UPDATE lembaga SET
        kdLembaga='" . $_POST['txtKdProgram'] . "',
        nmLembaga='" . $_POST['txtNmProgram'] . "',
        jenis='" . $_POST['txtIdLembaga'] . "',
        alamat='" . $_POST['txtKeterangan'] . "',
        nmPimpinan='" . $_POST['txtDonasi'] . "',
        berkas='" . $_POST['txtDonasi'] . "',
        no_hp='" . $_POST['txtDonasi'] . "',
        no_rek='" . $_POST['txtRekening'] . "',
        tgl='" . $_POST['txtDonasi'] . "'
        WHERE id='" . $_POST['txtId'] . "'";
	$query_ubah = mysqli_query($con, $sql_ubah);

	if ($query_ubah) {
		echo "<script>alert('Ubah Berhasil')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php?page=lembaga'>";
	} else {
		echo "<script>alert('Ubah Gagal')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php?page=lembaga'>";
	}
	//selesai proses ubah

} else {
	//mulai proses hapus
	if (isset($_GET['kode'])) {
		$sql_hapus = "DELETE FROM lembaga WHERE id='" . $_GET['kode'] . "'";
		$query_hapus = mysqli_query($con, $sql_hapus);

		if ($query_hapus) {
			echo "<script>alert('Hapus Berhasil')</script>";
			echo "<meta http-equiv='refresh' content='0; url=index.php?page=lembaga'>";
		} else {
			echo "<script>alert('Hapus Gagal')</script>";
			echo "<meta http-equiv='refresh' content='0; url=index.php?page=lembaga'>";
		}
	}
	//selesai proses hapus
}

function uploadFiles()
{
	$ekstensi_diperbolehkan	= array('rar', 'zip', '7z');
	$nama = $_FILES['txtBerkasLembaga']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$namas = 'Lembaga_' . $_POST['txtNmLembaga'] . "." . $ekstensi;
	$ukuran	= $_FILES['txtBerkasLembaga']['size'];
	$file_tmp = $_FILES['txtBerkasLembaga']['tmp_name'];

	if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
		if ($ukuran < 41943040) {
			move_uploaded_file($file_tmp, __DIR__ . '/../../files/' . $namas);
			return $namas;
		} else {
			return;
		}
	} else {
		return;
	}
}

?>
