<?php
include_once("../../koneksi.php");

?>
<!-- <h4><span class="glyphicon glyphicon-briefcase"></span>Yayasan SMK NU Ma'arif Kudus</h4> -->
<div id="main">
  <header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
      <i class="bi bi-justify fs-3"></i>
    </a>
  </header>

  <div class="page-heading">
    <h3>Kelola Dana</h3>
  </div>

  <div class="page-content">
    <section class>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#cetak"><i
              class="fa fa-book"></i>
              Lihat Laporan
            </button>&nbsp;
            <button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#cetak1"><i
            class="fa fa-book"></i>
            Cetak Laporan
          </button>
          <br>
          <br>
              <!-- Program Terdaftar -->
            </div>
            <div class="card-body">
          <table class="table table-striped" id="program7">
                <thead>
                  <center>
                    <tr>
                      <th>No</th>
                      <th>Kode Program</th>
                      <th>Nama Program</th>
                      <th>Lembaga</th>
                      <th>Donasi</th>
                     
                    </tr>
                  </center>
                </thead>
                <tbody>

                  <?php

                  $sql_tampil = "SELECT a.id, a.kdProgram, a.nmProgram, b.nmLembaga, a.keterangan, a.donasi, a.status FROM program a, lembaga b WHERE a.idLembaga=b.id AND (a.status='T' or a.status='P') AND a.idLembaga='$data_id' AND a.idLevel='1'";
                  $query_tampil = mysqli_query($con, $sql_tampil);
                  $no = 1;
                  while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
                  ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['kdProgram']; ?> <br>

                      </td>
                      <td><?php echo $data['nmProgram']; ?></td>
                      <td><?php echo $data['nmLembaga']; ?></td>
                      <td><?php echo $data['donasi']; ?></td>

                      
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

<div id="cetak" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Cetak Laporan</h4>
        </div>
        <div class="modal-body">

        <div class="form-group">
          <label for="inputnim" class="col-lg-2 control-label">Tahun</label>
          <select class="form-control" name="tahun" id="tahun">
          <option value="">- Pilih -</option>
                <?php
                  $p = mysqli_query($con, "select YEAR(tgl_masuk) as tahun FROM program WHERE idLembaga='$data_id' AND idLevel='1'") or die(mysqli_error($con));
                  while ($datap = mysqli_fetch_array($p)) {
                      echo '<option value="' . $datap['id'] . '">' . $datap['tahun'] . ' </option>';
                  } ?>
                
                </select>
          </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="btnSimpan">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>


<div id="cetak1" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Lihat Laporan</h4>
        </div>
        <div class="modal-body">

        

          <div class="form-group">
          <label for="inputnim" class="col-lg-2 control-label">Tahun</label>
          <select class="form-control" name="tahun" id="tahun">
          <option value="">- Pilih -</option>
                <?php
                  $p = mysqli_query($con, "select YEAR(tgl_masuk) as tahun FROM program WHERE idLembaga='$data_id' AND idLevel='1'") or die(mysqli_error($con));
                  while ($datap = mysqli_fetch_array($p)) {
                      echo '<option value="' . $datap['id'] . '">' . $datap['tahun'] . ' </option>';
                  } ?>
                
                </select>
          </div>

          <!-- SELECT kdProgram, nmProgram, keterangan, YEAR(tgl_masuk) as tahun FROM program WHERE YEAR(tgl_masuk)='2021'
        Jangan Dihapus dulu is -->
          <div class="form-group">
                      <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" id="cetak" name="cetak" class="btn btn-primary">Cetak</button>
                        <form method="post" enctype="multipart/form-data">
                          <div class="modal-footer">
                            <a href="?page=printAllDana" class="btn btn-primary" target="_blank"><i
                                class="fa fa-fw fa-print"></i> Cetak Semua</a>
                          </div>
                        </form>

                      </div>
                    </div>
      </div>
    </form>
  </div>
</div>

<script>
  $('#program7').DataTable({
    scrollY: 350,
  });
</script>

