<?php include_once("../../koneksi.php"); ?>

<div id="main">
  <header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
      <i class="bi bi-justify fs-3"></i>
    </a>
  </header>

  <div class="page-content">
    <section class>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              Transaksi Donasi
            </div>
            <div class="card-body">
              <table class="table table-striped" id="table99">
                <thead>
                  <center>
                    <tr>
                      <th>No</th>
                      <th>Kode Program</th>
                      <th>Nama Program</th>
                      <th>ID Donatur</th>
                      <th>Donasi</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </center>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    $data = SelectDataTransaksiDonasi();
                    foreach ($data as $value) {
                      ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $value['kdProgram']; ?></td>
                          <td><?php echo $value['nmProgram']; ?></td>
                          <td><?php echo $value['nama']; ?></td>
                          <td><?php echo $value['nominal']; ?></td>
                          <td>
                            <?php
                              if ($value['status'] == 'K') {
                                echo 'Terkonfimasi';
                              } else {
                                echo 'Ditangguhkan';
                              }
                            ?>
                          </td>
                          <td>
                            <?php
                              if ($value['status'] == 'T') {
                              ?>
                                <a href="?level=perseorangan&page=confirm&kode=<?php echo $value['id']; ?>&idProgram=<?php echo $value['idProgram']  ?>&postVal=<?php echo $value['nominal'] ?>" class='btn btn-warning btn-sm'><i class="fa fa-check"></i></a>
                              <?php
                              } else {
                                echo '<a href="#" class="btn btn-success btn-sm">Success</a>'; 
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
        </div>
      </div>
  </div>

  </section>
</div>

<script>
  // console.log($('#program1'))
  $('#table99').DataTable();
</script>