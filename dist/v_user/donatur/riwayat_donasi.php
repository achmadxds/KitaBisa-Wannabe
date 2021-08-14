<?php include_once("../../koneksi.php"); ?>

<div id="main">
  <header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
      <i class="bi bi-justify fs-3"></i>
    </a>
  </header>

  <div class="page-heading">
    <h3>Riwayat Donasi</h3>
  </div>
  <div class="page-content">
    <section class="row">
      <div class="card">
        <div class="card-body">
          <table class="table table-striped" id="program3">
            <thead>
              <center>
                <tr>
                  <th>Nama Program</th>
                  <th>Nominal Donasi</th>
                  <th>Lembaga</th>
                  <th>Status</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                </tr>
              </center>
            </thead>
            <tbody>
              <?php
                $a = RecordTransaction($idPengguna);
                foreach ($a as $key => $value) {
                  ?>
                    <tr>
                      <td><b><?php echo $value['nmProgram'] ?></b></td>
                      <td><b><?php echo $value['nominal'] ?></b></td>
                      <?php
                        if($value['idLevel'] == 1) {
                          echo "<td><b> Lembaga </b></td>";
                        } else {
                          echo "<td><b> Perseorangan </b></td>";
                        }
                      ?>
                      <?php
                        if($value['status'] == 'T') {
                          echo "<td><b> Tangguhkan </b></td>";
                        } else {
                          echo "<td><b> Terkonfirmasi </b></td>";
                        }
                      ?>
                      <td><b><?php echo date("d-m-Y", strtotime($value['tanggal'])) ?></b></td>
                      <td>
                        <?php
                          if($value['bukti_transfer'] != null) {
                            ?>
                              <a href="javascript:void(0)" class="btn btn-success btn-sm"><b>Terunggah</b></a>
                            <?php
                          } else {
                            ?>
                              <a href="#" data-id="<?php echo $value['id'] ?>" onclick="getID(this)" class="btn btn-warning btn-sm text-dark" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>Menunggu</b></a>
                            <?php
                          }
                        ?>
                      </td>
                    </tr>
                  <?php
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="?level=donatur&page=aksiTambah" method="post">
        <div class="modal-body text-center">
          <h3>Upload Bukti Transfer</h3>
          <hr>
          <input type="file" name="invoices" class="form-control">
          <input type="hidden" name="xcvb" id="xcvb">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="updateBuktiTransfer">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $('#program3').DataTable({
    scrollY: 350,
    "columns": [
      { "width": "25%" },
      { "width": "15%" },
      { "width": "20%" },
      { "width": "20%" },
      { "width": "10%" },
      { "width": "10%" }
    ]
  });

  function getID(param) {
    $('#xcvb').val($(param).data("id"))
  }
</script>