<?php
include_once("koneksi.php");
// $con = mysqli_connect("localhost", "root", "", "sosial");
				$sql_cek = "SELECT MAX(id) as id FROM perseorangan";
        $query_cek = mysqli_query($con, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
if (isset($_POST['btnReg'])) {
	
	$sql_simpan = "INSERT INTO user (nama, username, password, level, idDaftar, status) VALUES (
                    '" . $_POST['txtNama'] . "',
                    '" . $_POST['txtUsername'] . "',
                    '" . $_POST['txtPassword'] . "',
										'perseorangan',
										'".$data_cek['id']."',
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

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Portal Peduli-Ku</title>

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
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
										<font face="Trebuchet MS"><b>REGISTRASI PERSEORANGAN <BR>
												PORTAL PEDULI-KU</b></font><br>
										<br><br>

										<form action="" method="post" enctype="multipart/form-data">
											<div class="form-group">
												<label class="col-sm-5 control-label">Nama Pengguna </label>
												<div class="col-sm-8">
													<input type="text" class="form-control" placeholder="Nama Pengguna " name="txtNama" required="" />
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-5 control-label">Username </label>
												<div class="col-sm-8">
													<input type="text" class="form-control" placeholder="Username" name="txtUsername" required="" />
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-5 control-label">Password </label>
												<div class="col-sm-8">
													<input type="password" class="form-control" placeholder="Password" name="txtPassword" required="" />
												</div>
											</div>
											<br>
											<div class="form-group col-sm-5">
												<!-- <button class="form-control btn btn-primary" name="btnDaftarPers">Daftar</button> -->
												<input type="submit" class="form-control btn btn-primary" name="btnReg" value="Daftar">
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