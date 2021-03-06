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
            <div class="card-body">
              <table class="table table-striped" id="program7">
                <thead>
                  <center>
                    <tr>
                      <th>No</th>
                      <th>Kode Program</th>
                      <th>Program</th>
                      <th>Dana Target</th>
                      <th>Dana Terkumpul</th>
                      <th>Tidak Terkumpul</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </center>
                </thead>
                <tbody>

                  <?php

                  $sql_tampil = "SELECT *, donasi - jumlah as kurang FROM program where `status`='A' AND idLembaga='$data_id' AND idLevel=1";
                  // $sql_tampil = "SELECT a.id, b.id as boom, a.nominal, a.status, b.kdProgram, b.nmProgram, b.donasi, b.idLembaga FROM transaksi a, program b WHERE a.idProgram=b.id AND b.idLembaga='$data_id' AND b.idlevel='1'";
                  $query_tampil = mysqli_query($con, $sql_tampil);
                  $no = 1;
                  while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
                  ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['kdProgram']; ?></td>
                      <td><?php echo $data['nmProgram']; ?></td>
                      <td>Rp. <?php echo $data['donasi']; ?></td>
                      <td>Rp. <?php echo $data['jumlah']; ?></td>
                      <td>Rp. <?php echo $data['kurang']; ?></td>
                      <td><a href="javascript:void(0)" class="btn btn-success">Terkonfirmasi</a></td>

                      <td>
                      <?php
                        if ($data_status == 'O-pimpinan') {
                        ?>
                         
                        <?php
                        } elseif ($data_status == 'O-admin') {
                        ?>
                         <a href="?page=rekapDana&idKode=<?php echo $data['id']; ?>&jumlahs=<?php echo $data['jumlah']; ?>" class="btn btn-primary"><b>Rekap</b></a>
                        <?php
                        } else {
                        ?>
                        <?php
                        } ?>
                        
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
        <h4 class="modal-title">Tambah Program</h4>
      </div>
      <form action="?page=danaAksi" method="post" enctype="multipart/form-data">
        <div class="modal-body">

          <div class="form-group">
            <label>Lembaga</label>
            <select name="txtIdLembaga" class="form-control">
              <option value="">- Lembaga -</option>
              <?php
              $p = mysqli_query($con, "select id, kdProgram, nmProgram FROM program where idLembaga='$data_id'") or die(mysqli_error($con));
              while ($datap = mysqli_fetch_array($p)) {
                echo '<option value="' . $datap['id'] . '">' . $datap['kdProgram'] . ' - ' . $datap['nmProgram'] . '</option>';
              } ?>
            </select>
          </div>

          <div class="form-group">
            <label>Jumlah Donasi</label>
            <input type="text" class="form-control" name="txt" readonly/>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="btnSimpanKelolaDana">Simpan</button>
          </div>
      </form>
    </div>
  </div>
</div>

<script>
  $('#program7').DataTable({
    scrollY: 350,
  });
</script>