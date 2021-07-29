<?php
include_once("../koneksi.php");

?>

<div id="main">
  <header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
      <i class="bi bi-justify fs-3"></i>
    </a>
  </header>


  <div class="page-content">
    <section class>

      <br>
      <br>
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
                      <th></th>
                    </tr>
                  </center>
                </thead>
                <tbody>

                  <?php

                  $sql_tampil = "SELECT a.id, b.kdProgram, b.nmProgram, a.idDonatur, a.nominal, a.status FROM transaksi a, program b WHERE a.idProgram=b.id AND b.idLembaga='$data_id' AND b.idLevel='2'";
                  $query_tampil = mysqli_query($con, $sql_tampil);
                  $no = 1;
                  while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
                  ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['kdProgram']; ?> <br>

                      </td>
                      <td><?php echo $data['nmProgram']; ?></td>
                      <td><?php echo $data['idDonatur']; ?></td>
                      <td><?php echo $data['nominal']; ?></td>
                      <td>
                        <?php
                        if ($data['status'] == 'K') {
                        ?>
                          Terkonfirmasi
                        <?php
                        } else {
                        ?>
                          Ditangguhkan
                      </td>
                    <?php
                        } ?></td>

                    <td>
                      <?php
                      if ($data['status'] == 'T') {
                      ?>
                        <a href="?page=confirm&kode=<?php echo $data['id']; ?>" class='btn btn-warning btn-sm'><i class="fa fa-check"></i></a>
                      <?php
                      } else {
                      ?>
                        <a href="#" class='btn btn-success btn-sm'>Success</a>
                    </td>
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

<script>
  // console.log($('#program1'))
  $('#table99').DataTable({
    scrollY: 350,
  });
</script>