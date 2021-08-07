<?php include_once("__DIR__ .  ../../../../koneksi.php"); ?>

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
              Kelola Dana
            </div>
            <div class="card-body">
              <?php
                $data = SelectDataDana($_SESSION["ses_id"]);
                $no = 1;
              ?>

              <?php
                if(mysqli_num_rows($data) > 0) {
                  ?>
                    <table class="table table-striped" id="table111">
                      <thead>
                          <tr>
                            <th>No</th>
                            <th>Kode Program</th>
                            <th>Nama Program</th>
                            <th>Dana Target</th>
                            <th>Dana Masuk</th>
                            <th>Dana Tidak Tercapai</th>
                            <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php
                          foreach ($data as $value) {
                            ?>
                              <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $value['kdProgram']; ?></td>
                                <td><?php echo $value['nmProgram']; ?></td>
                                <td><?php echo $value['donasi']; ?></td>
                                <td><?php echo $value['jumlah']; ?></td>
                                <td><?php echo $value['kurang']; ?></td>
                                <td>
                                <!-- ?level=perseorangan&page=dana&idKode=<?php echo $value['id'] ?>&jumlahs=<?php echo $value['jumlah'] ?> -->
                                  <a href="?level=perseorangan&page=rekapDana&idKode=<?php echo $value['id'] ?>&jumlahs=<?php echo $value['jumlah'] ?>" class="btn btn-primary btn-sm">Rekap</a>
                                </td>
                              </tr>
                            <?php
                            $no++;
                          }
                        ?>
                      </tbody>
                    </table>
                  <?php
                } else {
                  echo '<h1 class="text-center">BELUM ADA PROGRAM TERARSIP</h1>';
                }
              ?>
            </div>
          </div>
        </div>
      </div>
  </div>

  </section>
</div>

<script>
  $('#table111').DataTable({})
</script>