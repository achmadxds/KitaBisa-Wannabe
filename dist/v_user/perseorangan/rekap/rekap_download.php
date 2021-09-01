<?php 
	error_reporting(0);
	include_once("__DIR__ .  ../../../../../koneksi.php"); 
	if (isset($_GET['aidi'])) {
		$sql_cek = "SELECT * FROM perseorangan WHERE id='" . $_GET['aidi'] . "'";
		$query_cek = mysqli_query($con, $sql_cek);
		$data_ceks = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
	}
	// echo '<pre>';
	// print_r($data_ceks);
	// echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title></title>

	<!-- Bootstrap core CSS -->
	<link href="css/sb-admin.min.css" rel="stylesheet">
</head>

<body style=color:black;>

	<table border="0" cellspacing="0" cellpadding="0">
		<thead>

		</thead>
		<tbody>
			<tr>
				<td style=width:150px;>
					<center>
						<img src="../../../../images/donasi.png" width="110" height="110">
					</center>
				</td>
				<td style=width:1066px;>
					<center>
						SISTEM INFORMASI<br>
						<b>PORTAL DONASI PEDULIKU</b><br>
						Ds. Panjunan Lor Kecamatan Kota <br> Kabupaten Kudus, Jawa Tengah 59361<br>
						Email : pedulikudus@gmail.com <br>
						<!-- Website : kecamatangembong.patikab.go.id<br> -->
					</center>
				</td>
				<td style=width:150px;>
					<center>

					</center>
				</td>
			</tr>
		</tbody>
	</table>

	<hr>
	<br>
	<center>
		Laporan Program Donasi <b>
			<?php
			if (isset($_GET['years']) != null) {
				echo $_GET['years'];
			}
			?>
		</b>
	</center>
	<center>
		<h3><?php echo $data_ceks['nama'] ?></h3>
	</center>
	<table border="1" style="width: 100%">
		<thead>
			<?php
			switch ($_GET['tj']) {
				case 'program':
				?>
					<tr>
						<th>No</th>
						<th>Kode</th>
						<th>Nama Program</th>
						<th>Tanggal Awal</th>
						<th>Tanggal Akhir</th>
						<th>Donasi Target</th>
						<th>Donasi Terkumpul</th>
						<th>Donasi Tidak Terkumpul</th>
					</tr>
				<?php
					break;

				case 'donasi':
				?>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Nama Donatur</th>
						<th>Nomor Telp</th>
						<th>Nominal Transaksi</th>
					</tr>
				<?php
					break;
			}
			?>
		</thead>
		<tbody>
			<?php
			$a = $_GET['aidi'];
			$no = 1;

			switch ($_GET['tj']) {
				case 'program':
					$_GET['years'] == 0000 ? $sql_tampil = "SELECT * FROM program where idLembaga=$a AND `status`='A' AND idLevel='2'" : $sql_tampil = "SELECT * FROM program where idLembaga=$a AND `status`='A' AND idLevel='2' AND YEAR(tgl_masuk) = '".$_GET['years']."' ";
					$query_tampil = mysqli_query($con, $sql_tampil);
					while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
					?>
						<tr>	
							<td align="center"><?php echo $no; ?></td>
							<td align="center"><?php echo $data['kdProgram']; ?></td>
							<td align="center"><?php echo $data['nmProgram']; ?></td>
							<td align="center"><?php echo date("d-m-Y", strtotime($data['tgl_masuk'])); ?></td>
							<td align="center"><?php echo date("d-m-Y", strtotime($data['tgl_akhir'])); ?></td>
							<td align="center">Rp. <?php echo $data['donasi']; ?></td>
							<td align="center">Rp. <?php echo $data['jumlah']; ?></td>
							<td align="center">Rp. <?php echo $data['donasi'] - $data['jumlah']; ?></td>
						</tr>
					<?php
						$no++;
					}
					break;

				case 'donasi':
					$sql_tampil = "SELECT b.*, a.nominal, a.tanggal FROM transaksi a, donatur b where a.idProgram=$a AND a.idDonatur=b.id";
					$query_tampil = mysqli_query($con, $sql_tampil);
					$sum = 0;
					while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
						$sum+=$data['nominal'];
					?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
							<td><?php echo $data['nama']; ?></td>
							<td><?php echo $data['no_hp']; ?></td>
							<td>Rp. <?php echo $data['nominal']; ?></td>
						</tr>
					<?php
						$no++;
					}
					?>
						<tr>
							<td></td>
							<td></td>
							<td><b>TOTAL</b></td>
							<td></td>
							<td><b>Rp. <?php echo $sum ?></b></td>
						</tr>
					<?php
					break;
			}
			?>
			<?php
			?>
			</center>
		</tbody>
	</table>

	<br>
	<table border="0" cellspacing="0" cellpadding="0">
		<thead>

		</thead>
		<tbody>
			<tr style=width:1066px;>
				<p style="text-align:right;"> Tanggal Pembuatan Laporan : <?php echo date("d-m-Y") ?></p>
			</tr>
			<center>

				Mengetahui & Menyetujui<br>
				<br><br>
			</center>

			<tr>
				<td style=width:1066px; align="center">
					Pimpinan Organisasi <br>
					<b><?php echo $data_ceks['nmLembaga'] ?></b>
					<br><br><br><br><br>
					<b><?php echo $data_ceks['nmPimpinan'] ?></b>
				</td>

				<td style=width:1066px; align="center">
					CEO Peduliku <br><br>
					<center>
						<img src="../../../../images/donasi.png" width="60" height="60">
					</center><br>
					<b>
						Muhammad Ali
					</b>
				</td>
			</tr>
		</tbody>
	</table>
	</center>
	<script>
		window.print();
	</script>

</body>

</html>