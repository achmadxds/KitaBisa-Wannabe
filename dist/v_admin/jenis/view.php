<?php
include_once("../../koneksi.php");
?>

<div id="main">
	<header class="mb-3">
		<a href="#" class="burger-btn d-block d-xl-none">
			<i class="bi bi-justify fs-3"></i>
		</a>
	</header>


	<div class="page-content">
		<section class>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
				<a data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary btn-sm">Tambah Jenis</a>
				<hr>
					<table class="table table-striped" id="tables1">
						<thead>
							<center>
								<tr>
									<th>No</th>
									<th>Jenis</th>
									<th>Action</th>
								</tr>
							</center>
						</thead>
						<tbody>

							<?php
							$sql_tampil = "SELECT * FROM mst_jenis";
							$query_tampil = mysqli_query($con, $sql_tampil);
							$no = 1;
							while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
							?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $data['nama']; ?></td>
									<td>
										<a href="?page=jnsUbah&kode=<?php echo $data['id']; ?>" class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
										<a href="?page=jnsAksi&kode=<?php echo $data['id']; ?>" onclick="return confirm('Hapus Jenis ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
									</td>
								</tr>
							<?php
								$no++;
							}

							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

</section>
</div>

<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Jenis</h4>
			</div>
			<div class="modal-body">
				<form action="?page=jnsAksi" method="post" enctype="multipart/form-data">

					<div class="form-group">
						<label>Jenis Donasi</label>
						<input type="text" class="form-control" name="txtJenis" />
					</div>
					<div class="form-group">
						<label> Jenis </label>
						<div>
							<select name="txtPil" class="form-control" required>
								<option value=""> - Jenis -</option>
								<option value="1">Lembaga</option>
								<option value="0">Perseorangan</option>
							</select>
						</div>
					</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary" name="btnSimpan">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>

<script>
	$('#tables1').DataTable({
		scrollY: 350,
	});
</script>