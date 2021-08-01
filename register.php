<?php
include_once("koneksi.php");
if (isset($_POST['btnDaftarPer'])) {
	
	$date = date('Y-m-d');
	$sql_simpan = "INSERT INTO donatur (kdDonatur, nama,jekel,alamat,no_hp,id_chat,tgl_daftar) VALUES (
                    '" . $_POST['txtKd'] . "',
										'" . $_POST['txtNm'] . "',
                    '" . $_POST['txtJekel'] . "',
										'" . $_POST['txtAlamat'] . "',
                    '" . $_POST['txtNohp'] . "',
										'" . $_POST['txtIdChat'] . "',
                    '$date')";
	$query_simpan = mysqli_query($con, $sql_simpan);

	if ($query_simpan) {
		echo "<script>alert('Tahap Selanjutnya')</script>";
		echo "<meta http-equiv='refresh' content='0; url=regDonatur.php'>";
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
	<title>Portal Donasi-Ku</title>

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
										<font face="Trebuchet MS"><b>REGISTRASI DONATUR <BR>
												PORTAL DONASI-KU</b></font><br>
										<br><br>
										<form action="" method="post" enctype="multipart/form-data">
											<div class="form-group col-sm-8">
												<label class="col-sm-6 control-label">Kode Donatur </label>
												<div class="col-sm-12">
													<input type="text" class="form-control" placeholder="Nama Donatur" name="txtKd" value="<?php
										echo(uniqid());	?>" readonly />
												</div>
											</div>
											<div class="form-group col-sm-8">
												<label class="col-sm-6 control-label">Nama </label>
												<div class="col-sm-12">
													<input type="text" class="form-control" placeholder="Nama Donatur" name="txtNm" required autofocus />
												</div>
											</div>

											<div class="form-group"col-sm-8>
												<label class="col-sm-6 control-label">Jenis Kelamin</label>
												<div class="col-sm-8">
													<select name="txtJekel" class="form-control" required>
														<option value=""> - Jenis Kelamin -</option>
														<option value="P">Perempuan</option>
														<option value="L">Laki-Laki</option>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-6 control-label">No Handphone </label>
												<div class="col-sm-8">
													<input type="text" class="form-control" placeholder="Masukkan No HP" name="txtNohp" required="">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-6 control-label">ID Chat Telegeram </label>
												<div class="col-sm-8">
													<input type="text" class="form-control" placeholder="Masukkan ID Chat" name="txtIdChat" required="">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-6 control-label">Alamat </label>
												<div class="col-sm-8">
													<input type="text" class="form-control" placeholder="Masukkan Alamat" name="txtAlamat" required="">
												</div>
											</div>

										
											<br>
											<div class="form-group col-sm-5">
												<input type="submit" class="form-control btn btn-primary" value="Daftar" name="btnDaftarPer">
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