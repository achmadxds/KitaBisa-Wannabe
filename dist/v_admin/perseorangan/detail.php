<?php
include_once("../koneksi.php");
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT a.id, a.kdPerseorangan, a.nama, a.jekel, a.alamat, a.berkas, a.no_hp, a.no_rek, a.tgl_daftar, b.status FROM perseorangan a, user b WHERE b.idDaftar=a.id AND  b.level='perseorangan' AND a.id='".$_GET['kode']."'";
        $query_cek = mysqli_query($con, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>


<div id="main">
	<header class="mb-3">
		<a href="#" class="burger-btn d-block d-xl-none">
			<i class="bi bi-justify fs-3"></i>
		</a>
	</header>


	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h6>
						Detail <small><?php echo $data_cek['nama']?></small>
					</h6>
				</div>
				<div class="card-body">
					<div class="panel-body">
					<div class="tabs">
											<ul class="nav nav-tabs nav-justified">
												<li class="active">
													<a href="#popular10" data-bs-toggle="tab" class="text-center"><i class="fa fa-tags"></i> Detail Surat</a>
												</li>&nbsp;
												<li>
													<a href="#recent10" data-bs-toggle="tab" class="text-center"><i class="fa fa-envelope"></i> File Berkas</a>
												</li>
											</ul>
										</div>
										<div class="tab-content">
											<div id="popular10" class="tab-pane active">
												<section class="panel">
													<div class="panel-body">
														<table class="table">
															<tbody>
																
																			<tr class="gradeX">
																				<td width="170"><b>ID Individu</b></td>
																				<td><?php echo $data_cek['kdPerseorangan']; ?></td>

																			</tr>
																			<tr class="gradeX">
																				<td width="170"><b>Nama</b></td>
																				<td><?php echo $data_cek['nama']; ?></td>

																			</tr>

																			<tr class="gradeX">
																				<td width="170"><b>Jenis Kelamin</b></td>
																				<td>
                                        <?php if ($data_cek['jekel'] == 'P') { ?>
																						Perempuan
																					<?php
																					} else {
																					?>
																						Laki - Laki
																					<?php
																					}
																					?>
                                        </td>
																			</tr>
																			<tr class="gradeX">
																				<td width="170"><b>Alamat</b></td>
																				<td><?php echo $data_cek['alamat']; ?></td>
																			</tr>

																			<tr class="gradeX">
																				<td width="170"><b>Berkas</b></td>
																				<td><?php echo $data_cek['berkas']; ?></td>
																			</tr>

                                      <tr class="gradeX">
																				<td width="170"><b>No HP</b></td>
																				<td><?php echo $data_cek['no_hp']; ?></td>
																			</tr>

                                      <tr class="gradeX">
																				<td width="170"><b>No Rekening</b></td>
																				<td><?php echo $data_cek['no_rek']; ?></td>
																			</tr>

																			<tr class="gradeX">
																				<td width="170"><b>Tanggal Daftar</b></td>
																				<td><?php echo date("d-m-Y", strtotime($data_cek['tgl_daftar']));
																						?></td>
																			</tr>
																			
															</tbody>
														</table>
														<tr>
														<?php
														if($data_cek['status'] == 'Aktif'){
														?>
														<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo"><?php echo $data_cek['status'] ?></button>
														<?php
														}else{
														?>
														<button type="button" class="btn btn-warning" data-toggle="collapse" data-target="#demo"><?php echo $data_cek['status'] ?></button>
														<?php
														}
														?>
														</tr>
												</section>
											</div>
											</form>

											<div id="recent10" class="tab-pane">
												<section class="panel">
													<?php
														if($data_cek['berkas'] != null) {
															?>
																<embed src="/kitabisa-wannabe/files/<?php echo $data_cek['berkas']; ?>"c type="application/pdf" width="100%" height="600px">
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