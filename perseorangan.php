<?php
include_once("koneksi.php");
$carikode = mysqli_query($con, "SELECT MAX(kdPerseorangan) FROM perseorangan");
// menjadikannya array
$datakode = mysqli_fetch_array($carikode);
// jika $datakode
if ($datakode) {
	// membuat variabel baru untuk mengambil kode mulai dari 3
	$nilaikode = substr($datakode[0], 3);
	// menjadikan $nilaikode ( int )
	$kode = (int) $nilaikode;
	// setiap $kode di tambah 1
	$kode = $kode + 1;
	// hasil untuk menambahkan kode 
	// angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
	// atau angka sebelum $kode
	$hasilkode = "DPM" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
	$hasilkode = "DPM001";
}

if (isset($_POST['btnDaftarPers'])) {
	$date = date('Y-m-d');
	$sql_simpan = "INSERT INTO perseorangan (kdPerseorangan, nama, jekel, alamat, berkas, no_hp, no_rek, tgl_daftar) VALUES (
											'" . $_POST['txtKd'] . "',
											'" . $_POST['txtNm'] . "',
											'" . $_POST['txtJekel'] . "',
											'" . $_POST['txtAlamat'] . "',
											'" . uploadFile() . "',
											'" . $_POST['txtNohp'] . "',
											'" . $_POST['txtNoRek'] . "',
											'$date')";
	$query_simpan = mysqli_query($con, $sql_simpan);

	if ($query_simpan) {
		echo "<script>alert('Tahap Selanjutnya')</script>";
		echo "<meta http-equiv='refresh' content='0; url=reg_user.php'>";
	} else {
		echo "<script>alert('Proses Gagal')</script>";
	}
}

function uploadFile()
{
	$ekstensi_diperbolehkan	= array('rar', 'zip', '7z');
	$nama = $_FILES['txtBerkasu']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$namas = 'Perseorangan_' . $_POST['txtNm'] . "." . $ekstensi;
	$ukuran	= $_FILES['txtBerkasu']['size'];
	$file_tmp = $_FILES['txtBerkasu']['tmp_name'];

	if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
		if ($ukuran < 41943040) {
			move_uploaded_file($file_tmp, 'files/' . $namas);
			return $namas;
		} else {
			return 'c';
		}
	} else {
		return 'a';
	}
}
?>

<?php
include_once("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Portal Donasi-Ku</title>

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
		integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<link rel="stylesheet" href="dist/assets/css/bootstrap.css">

	<link rel="stylesheet" href="dist/assets/vendors/iconly/bold.css">

	<link rel="stylesheet" href="dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" href="dist/assets/vendors/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" href="dist/assets/css/app.css">
	<link rel="shortcut icon" href="dist/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
	<div id="app">
		<div id="main">

			<div class="page-content">
				<section class="content">
					<div class="row">
						<div class="col-8 mt-2">
							<div class="card m-5">

								<div class="card-body">
									<center>
										<font face="Trebuchet MS"><b>REGISTRASI PENGGALANGAN DANA <BR>
												PORTAL DONASI-KU</b></font><br>
										<br><br>
										<form action="" method="post" enctype="multipart/form-data">
											<div class="col-lg-12">
												<div class="row">
													<div class="col-6">
														<label class="control-label">
															<font face="Trebuchet MS">Kode Anda </font>
														</label>
														<input type="text" class="form-control" name="txtKd" value="<?php echo $hasilkode; ?>"
															readonly />
														<br>
														<label class="control-label">
															<font face="Trebuchet MS"> Nama </font>
														</label>
														<input type="text" class="form-control" placeholder="Nama" name="txtNm" autofocus />
														<br>
														<label class="col-sm-5 control-label">
															<font face="Trebuchet MS">Berkas </font>
														</label>
														<input type="file" class="form-control" placeholder="Pilih File PDF" name="txtBerkasu">
														<br>
														<code class="text-md-start">
															<br>
															*Persyaratan penggalangan dana <br>
															ada di halaman utama website
														</code>
													</div>
													<div class="col-6">
														<label class="control-label">
															<font face="Trebuchet MS">Jenis Kelamin </font>
														</label>
														<select name="txtJekel" class="form-control">
															<option value=""> - Jenis Kelamin -</option>
															<option value="P">Perempuan</option>
															<option value="L">Laki-Laki</option>
														</select>
														<br>
														<label class="control-label">
															<font face="Trebuchet MS">Alamat </font>
														</label>
														<input type="text" class="form-control" placeholder="Masukkan Alamat" name="txtAlamat">
														<br>
														<label class="control-label">
															<font face="Trebuchet MS">No Handphone </font>
														</label>
														<input type="text" class="form-control" placeholder="Masukkan No Handphone" name="txtNohp">
														<br>
														<label class="control-label">
															<font face="Trebuchet MS">No Rekening </font>
														</label>
														<input type="text" class="form-control" placeholder="Masukkan No Rekening" name="txtNoRek">
													</div>
												</div>
											</div>
											<br>
											<div class="form-group col-sm-5">
												<!-- <button class="form-control btn btn-primary" name="btnDaftarPers">Daftar</button> -->
												<input type="submit" class="form-control btn btn-primary" name="btnDaftarPers" value="Daftar">
											</div>
										</form>
									</center><br>
								</div>
							</div>
						</div>
					</div>

			</div>

			</section>
		</div>

	</div>
	</div>

</body>

</html>