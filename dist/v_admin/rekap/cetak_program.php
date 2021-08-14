<?php
error_reporting(0);
include_once("../../koneksi.php");
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
						<img src="../../../images/donasi.png" width="110" height="110">
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
		<h3>Laporan Program Diajukan</h3>
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
						<th>Tanggal Pengajuan</th>
						<th>Jumlah</th>
					</tr>
				<?php
					break;

				case 'donasi':
				?>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Nominal</th>
						<th>Nomor Hp</th>
						<th>Tanggal</th>
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
					$_GET['years'] == 0000 ? $sql_tampil = "SELECT * FROM program where idLembaga=$a AND `status`='A' AND idLevel='1'" : $sql_tampil = "SELECT * FROM program where idLembaga=$a AND `status`='A' AND idLevel='1' AND YEAR(tgl_masuk) = '".$_GET['years']."' ";
					$query_tampil = mysqli_query($con, $sql_tampil);
					while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
					?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data['kdProgram']; ?></td>
							<td><?php echo $data['nmProgram']; ?></td>
							<td><?php echo $data['tgl_masuk']; ?></td>
							<td><?php echo $data['jumlah']; ?></td>
						</tr>
						</center>
					<?php
						$no++;
					}
					break;

				case 'donasi':
					$sql_tampil = "SELECT b.*, a.nominal, a.tanggal FROM transaksi a, donatur b where a.idProgram=$a AND a.idDonatur=b.id";
					$query_tampil = mysqli_query($con, $sql_tampil);
					while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
					?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data['nama']; ?></td>
							<td><?php echo $data['nominal']; ?></td>
							<td><?php echo $data['no_hp']; ?></td>
							<td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
						</tr>
						</center>
					<?php
						$no++;
					}
					break;
			}
			?>
			<?php
			?>

		</tbody>
	</table>

	<br>
	<table border="0" cellspacing="0" cellpadding="0">
		<thead>

		</thead>
		<tbody>
			<tr>
				<td style=width:1040px;></td>
				<td style=width:330px;>
					<br><br><br>
					<div style=text-align:center;><b>Kudus, <?php echo date("d-m-Y"); ?></b><br></div>
					<br>

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