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
					<h4><b>REGISTRASI USER PENGGUNA<BR>
							PORTAL DONASI-KU</b></h4>
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
										<label class="col-sm-2 control-label">Kode Anda </label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Kode Registrasi Anda" name="txtKode" required="" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label">Nama Pengguna </label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Nama Pengguna " name="txtNama" required="" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label">Username </label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Username" name="txtUsername" required="" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label">Password </label>
										<div class="col-sm-8">
											<input type="password" class="form-control" placeholder="Password" name="txtPassword" required="" />
										</div>
									</div>


									<center>
										<a href="index.php" class='btn btn btn-warning btn-sm'>Kembali</a>
										<button type="submit" class="btn btn-success btn-sm" name="btnReg">Daftar</button>
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
//  include_once("koneksi.php");
$con = mysqli_connect("localhost", "root", "", "sosial");
if (isset($_POST['btnReg'])) {
	$sql_simpan = "INSERT INTO user (kdUser, nama, username, password, status) VALUES (
                    '" . $_POST['txtKode'] . "',
                    '" . $_POST['txtNama'] . "',
                    '" . $_POST['txtUsername'] . "',
                    '" . $_POST['txtPassword'] . "',
                    'Nonaktif')";
	$query_simpan = mysqli_query($con, $sql_simpan);

	if ($query_simpan) {
		echo "<script>alert('User Berhasil Dibuat, Silahkan Tunggu Konfirmasi !')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	} else {
		echo "<script>alert('Proses Gagal')</script>";
	}
	//selesai proses simpan
}
?>