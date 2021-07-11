<?php
include_once("../koneksi.php");
// KODE OTOMATIS
// membuat query max untuk kode
$carikode = mysqli_query($con, "SELECT MAX(kdLembaga) FROM lembaga");
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
	$hasilkode = "LMB" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
	$hasilkode = "LMB01";
}
// KODE OTOMATIS
?>

<!-- <h4><span class="glyphicon glyphicon-briefcase"></span>Yayasan SMK NU Ma'arif Kudus</h4> -->
<div class="form-group">

	<br>
	<div class="card mb-3">
		<div class="card-header">
			<a data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm">Tambah Data Lembaga</a>
		</div>
		<br>
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Lembaga</h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<center>
							<tr>
								<th>No</th>
								<th>Kode Lembaga</th>
								<th>Nama Lembaga</th>
								<th>Bidang</th>
								<th>Alamat</th>
								<th>Pimpinan</th>
								<th>No Rekening</th>
								<th></th>
							</tr>
						</center>
					</thead>
					<tbody>

						<?php

						$sql_tampil = "SELECT * FROM lembaga a, mst_jenis b WHERE a.idJenis=b.id";
						$query_tampil = mysqli_query($con, $sql_tampil);
						$no = 1;
						while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
						?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $data['kdLembaga']; ?></td>
								<td><?php echo $data['nmLembaga']; ?></td>
								<td><?php echo $data['nama']; ?></td>
								<td><?php echo $data['alamat']; ?></td>
								<td><?php echo $data['nmPimpinan']; ?></td>
								<td><?php echo $data['no_rek']; ?></td>

								<td>
									<a href="?page=lembUbah&kode=<?php echo $data['id']; ?>" class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
									<a href="?page=lembAksi&kode=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
								</td>
							</tr>
						<?php
							$no++;
						}

						?>
					</tbody>
				</table>
				<div id="myModal" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Tambah Program</h4>
							</div>
							<div class="modal-body">
								<form action="?page=lembAksi" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label>Kode Lembaga</label>
										<input type="text" class="form-control" name="txtKdLembaga" value="<?php echo $hasilkode; ?>" readonly />
									</div>
									<div class="form-group">
										<label>Nama Lembaga</label>
										<input type="text" class="form-control" name="txtNmLembaga" />
									</div>

									<div class="form-group">
										<label>Jenis Lembaga</label>
										<select name="txtJenis" class="form-control">
											<option value="">- Lembaga -</option>
											<?php
											$p = mysqli_query($con, "select id, nama from mst_jenis WHERE jenis='1'") or die(mysqli_error($con));
											while ($datap = mysqli_fetch_array($p)) {
												echo '<option value="' . $datap['id'] . '">' . $datap['nama'] . '</option>';
											} ?>
										</select>
									</div>

									<div class="form-group">
										<label>Alamat</label>
										<input type="text" class="form-control" name="txtAlamat" />
									</div>

									<div class="form-group">
										<label>Nama Pimpinan</label>
										<input type="text" class="form-control" name="txtNmPimpinan" />
									</div>

									<div class="form-group">
										<label>Berkas</label>
										<input type="file" class="form-control" name="txtBerkasLembaga" />
									</div>

									<div class="form-group">
										<label>No HP</label>
										<input type="text" class="form-control" name="txtNoHp" />
									</div>

									<div class="form-group">
										<label>No Rekening</label>
										<input type="text" class="form-control" name="txtRekening" />
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
										<button type="submit" class="btn btn-primary" name="btnSimpan">Simpan</button>
									</div>
								</form>
							</div>