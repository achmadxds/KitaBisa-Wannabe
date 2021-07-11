<?php
include_once("koneksi.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Registrasi | Perusahaan</title>
	<!-- BOOTSTRAP STYLES-->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<!-- FONTAWESOME STYLES-->
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" />
	<!-- CUSTOM STYLES-->
	<link href="assets/css/custom.css" rel="stylesheet" />
	<!-- GOOGLE FONTS-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>

<body OnLoad="document.login.username.focus();" colorbackground="blue">

	<body>

		<div class="container">
			<div class="row text-center">
				<div class="col-md-12">
					<br><br>
					<h3><b>REGISTRASI DONATUR <BR>
							PORTAL DONASI-KU</b></h3>
					<br>
				</div>
			</div>

			<section class="content">
				<div class="row">
					<div class="col-md-12">
						<!-- general form elements -->
						<div class="box box-primary">

							<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
								<div class="box-body">

									<div class="form-group">
										<label class="col-sm-2 control-label">Nama </label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Nama Donatur" name="txtNm" required autofocus />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label">Jenis Kelamin</label>
										<div class="col-sm-8">
											<select name="txtJekel" class="form-control" required>
												<option value=""> - Jenis Kelamin -</option>
												<option value="P">Perempuan</option>
												<option value="L">Laki-Laki</option>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label">No Handphone </label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Masukkan No HP" name="txtNohp" required="">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label">Alamat </label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Masukkan Alamat" name="txtAlamat" required="">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label">Username </label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Masukkan Username Pengguna" name="txtUsername" required="">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label">Password </label>
										<div class="col-sm-8">
											<input type="password" class="form-control" placeholder="Masukkan Password Pengguna" name="txtPassword" required="">
										</div>
									</div>
									<center>
										<a href="index.php" class='btn btn btn-warning btn-sm'>Kembali</a>
										<button type="submit" class="btn btn-success btn-sm" name="btnDaftarPer">Registrasi</button>
									</center>
								</div>
							</form>
						</div>
			</section>

		</div>


		</div>
		</div>

		<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
		<!-- JQUERY SCRIPTS -->
		<script src="assets/js/jquery-1.10.2.js"></script>
		<!-- BOOTSTRAP SCRIPTS -->
		<script src="assets/js/bootstrap.min.js"></script>
		<!-- METISMENU SCRIPTS -->
		<script src="assets/js/jquery.metisMenu.js"></script>
		<!-- CUSTOM SCRIPTS -->
		<script src="assets/js/custom.js"></script>

	</body>

</html>

<?php
include_once("koneksi.php");
//  $konek = mysqli_connect("localhost","root","","sosial"); 
if (isset($_POST['btnDaftarPer'])) {
	$date = date('Y-m-d');
	$sql_simpan = "INSERT INTO donatur (nama,jekel,alamat,no_hp,username,password,status,tgl_daftar) VALUES (
                    '" . $_POST['txtNm'] . "',
                    '" . $_POST['txtJekel'] . "',
					'" . $_POST['txtAlamat'] . "',
                    '" . $_POST['txtNohp'] . "',
                    '" . $_POST['txtUsername'] . "',
                    '" . $_POST['txtPassword'] . "',
                    'Nonaktif',
                    '$date')";
	$query_simpan = mysqli_query($con, $sql_simpan);

	if ($query_simpan) {
		echo "<script>alert('Tahap Selanjutnya')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	} else {
		echo "<script>alert('Proses Gagal')</script>";
	}
	//selesai proses simpan
}
?>