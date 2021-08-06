<?php
include_once("koneksi.php");
if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * FROM program  WHERE id='" . $_GET['kode'] . "'";
	// $sql_ceks = "SELECT a.id, a.kdProgram, a.nmProgram, b.kdPerseorangan , b.nama, a.gambar, a.keterangan, a.idLembaga,  a.donasi, a.status, b.no_rek, a.idLevel FROM program a, perseorangan b WHERE a.idLembaga=b.id AND a.id='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($con, $sql_cek);
	// $query_ceks = mysqli_query($con, $sql_ceks);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
	// $data_ceks = mysqli_fetch_array($query_ceks, MYSQLI_BOTH);
}
?>

<div id="main">
	<header class="mb-3">
		<a href="#" class="burger-btn d-block d-xl-none">
			<i class="bi bi-justify fs-3"></i>
		</a>
	</header>
	<div class="row">
		<div class="col-6">
			<div class="card">
				<div class="card-header">
					<h6>
						Detail <small><?php echo $data_cek['nmProgram'] ?></small>
					</h6>
				</div>
				<div class="card-body">
					<div class="panel-body">
						<div class="tab-content">
							<div id="popular10" class="tab-pane active">

								<section class="panel">
									<div class="panel-body">
										<table class="table">
											<tbody>

												<tr class="gradeX">
													<td width="170"><b>ID Program</b></td>
													<td><?php echo $data_cek['kdProgram']; ?></td>

												</tr>
												<tr class="gradeX">
													<td width="170"><b>Nama Program</b></td>
													<td><?php echo $data_cek['nmProgram']; ?></td>
												</tr>

												<tr class="gradeX">
													<td width="170"><b>Lembaga / Perseorangan</b></td>
													<td>
														<?php if ($data_cek['idLevel'] == '1') { ?>
															Lembaga 
														<?php
														} else {
														?>
															Perseorangan 
														<?php
														}
														?>
													</td>
												</tr>

												<tr class="gradeX">
													<td width="170"><b>Keterangan</b></td>
													<td><?php echo $data_cek['keterangan']; ?></td>
												</tr>

												<tr class="gradeX">
													<td width="170"><b>Donasi</b></td>
													<td><?php echo $data_cek['donasi']; ?></td>
												</tr>

												<tr class="gradeX">
													<td width="170"><b>Status Program</b></td>
													<td>
														<?php if ($data_cek['status'] == 'T') { ?>
															Ditangguhkan
														<?php
														} elseif ($data_cek['status'] == 'P') { ?>
															Publish
														<?php
														} else {
														?>
															Arsip
														<?php
														}
														?>
													</td>
												</tr>

											</tbody>
										</table>
								</section>
							</div>
							</form>

							<div id="recent10" class="tab-pane">
								<section class="panel">
									<?php
									if ($data_cek['gambar'] != null) {
									?>
										<embed src="/upload/surat/. "". ?>" type="application/pdf" width="100%" height="600px">
									<?php
									} else {
									?>
										<div class="text-center">
											<br>
											<h4>File Tidak Tersedia!</h4>
										</div>
									<?php
									}
									?>
								</section>
							</div>
							</form>
							</section>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>