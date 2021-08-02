<?php
include_once("koneksi.php");

function uploadfilesz()
{
	$ekstensi_diperbolehkan	= array('jpg', 'png', 'jpeg');
	$nama = $_FILES['txtfotoProgram']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$namas = 'Photo_' . $_POST['txtKdProgram'] . "_" . "Lembaga" . "." . $ekstensi;
	$ukuran	= $_FILES['txtfotoProgram']['size'];
	$file_tmp = $_FILES['txtfotoProgram']['tmp_name'];

	if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
		if ($ukuran < 41943040) {
			if (!move_uploaded_file($file_tmp, __DIR__ . '/../../../images/files/' . $namas)) {
				die();
			}
			return $namas;
		} else {
			return;
		}
	} else {
		return;
	}
}

if (isset($_POST['btnSimpan'])) {
	$date = date('Y-m-d');
	echo $_POST['txtJenis'];
	$sql_insert = "INSERT INTO program (kdProgram, nmProgram, idLembaga, keterangan, donasi, status, idLevel, gambar, tgl_masuk, tgl_akhir, idJenis) VALUES (
					'" . $_POST['txtKdProgram'] . "',
					'" . $_POST['txtNmProgram'] . "',
					'" . $_POST['txtidPengguna'] . "',
					'" . $_POST['txtketerangan'] . "',
          '" . $_POST['txtDonasi'] . "',
					'T',
          '1',
					'" . uploadfilesz() . "',
					'" . $date . "',
					'" . $_POST['txtAkhirtgl'] . "',
          '" . $_POST['txtJenis'] . "')";
	$query_insert = mysqli_query($con, $sql_insert) or die(mysqli_error($con));

	if ($query_insert) {
		echo "<script>alert('Simpan Berhasil')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php?page=prog'>";
	} else {
		echo "<script>alert('Simpan Gagal')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php?page=prog'>";
	}
} elseif (isset($_POST['btnUBAH'])) {
	//mulai proses ubah
	$sql_ubah = "UPDATE program SET
        kdProgram='" . $_POST['txtKdProgram'] . "',
        nmProgram='" . $_POST['txtNmProgram'] . "',
        idLembaga='" . $_POST['txtIdLembaga'] . "',
				idJenis='" . $_POST['txtJenis'] . "',
        keterangan='" . $_POST['txtKeterangan'] . "',
        donasi='" . $_POST['txtDonasi'] . "',
        status='T'
        WHERE id='" . $_POST['txtId'] . "'";
	$query_ubah = mysqli_query($con, $sql_ubah);

	if ($query_ubah) {
		echo "<script>alert('Ubah Berhasil')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php?page=prog'>";
	} else {
		echo "<script>alert('Ubah Gagal')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php?page=prog'>";
	}
	//selesai proses ubah

} else {
	//mulai proses hapus
	if (isset($_GET['kode'])) {
		$sql_hapus = "DELETE FROM program WHERE id='" . $_GET['kode'] . "'";
		$query_hapus = mysqli_query($con, $sql_hapus);

		if ($query_hapus) {
			echo "<script>alert('Hapus Berhasil')</script>";
			echo "<meta http-equiv='refresh' content='0; url=index.php?page=prog'>";
		} else {
			echo "<script>alert('Hapus Gagal')</script>";
			echo "<meta http-equiv='refresh' content='0; url=index.php?page=prog'>";
		}
	}
	//selesai proses hapus
}
