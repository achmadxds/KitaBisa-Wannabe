<?php
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM perseorangan WHERE id='".$_GET['kode']."'";
        $query_cek = mysqli_query($con, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>


    <section class="content-header">
      <h1>
        Detail <small><?php echo $data_cek['nama']?></small>
      </h1>
      
    </section>

					<!-- Main content -->
					<section class="content">
						<div class="card-body">
							<div class="box box-primary">
								<div class="box-header">
									<div class="panel-body">

										<div class="tabs">
											<ul class="nav nav-tabs nav-justified">
												<li class="active">
													<a href="#popular10" data-toggle="tab" class="text-center"><i class="fa fa-tags"></i> Detail Surat</a>
												</li>
												<li>
													<a href="#recent10" data-toggle="tab" class="text-center"><i class="fa fa-envelope"></i> File Surat</a>
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
												</section>
											</div>
											</form>

											<div id="recent10" class="tab-pane">
												<section class="panel">
													<?php
														if($data_cek['berkas'] != null) {
															?>
																<embed src="/upload/surat/. $kode->fileSurat ?>" type="application/pdf" width="100%" height="600px">
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