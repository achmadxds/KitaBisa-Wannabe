<?php include_once("../../koneksi.php"); ?>

<div id="main">
  <header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
      <i class="bi bi-justify fs-3"></i>
    </a>
  </header>

  <div class="page-heading">
    <h3>Transaksi Donasi</h3>
  </div>

  <div class="page-content">
    <section class>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table class="table table-striped" id="program6">
                <thead>
                  <center>
                    <tr>
                      <th>No</th>
                      <th>Kode Program</th>
                      <th>Program</th>
                      <th>Donatur</th>
                      <th>Nominal</th>
                      <th></th>
                    </tr>
                  </center>
                </thead>
                <tbody>

                  <?php

                  $sql_tampil = "SELECT a.id, a.nominal, a.status, b.kdProgram, b.nmProgram, b.idLembaga, c.nama  FROM transaksi a, program b, donatur c WHERE a.idProgram=b.id AND a.idDonatur=c.id AND b.idLembaga='$data_id'";
                  $query_tampil = mysqli_query($con, $sql_tampil);
                  $no = 1;
                  while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
                  ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['kdProgram']; ?></td>
                      <td><?php echo $data['nmProgram']; ?></td>
                      <td><?php echo $data['nama']; ?></td>
                      <td>Rp. <?php echo $data['nominal']; ?></td>

                      <td>
                        <?php
                        if ($data['status'] == 'T') {
                        ?>
                          <form action="?page=aksi" method="post">
                            <input type="hidden" name="idTransksisu" value="<?php echo $data['id']; ?>">
                            <button name="btnUpdateStatusTransaksi" class='btn btn-warning btn-sm'> <i class="fa fa-check"></i> </button>
                          </form>
                          <!-- <a href="?page=danaKonfirm&kode=<?php echo $data['id']; ?>" class='btn btn-warning btn-sm'><i class="fa fa-check"></i>
                            <form action="" method="post"></form>
                          </a> -->
                        <?php
                        } else {
                        ?>
                          Terkonfirmasi
                        <?php
                        }
                        ?>
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
    </section>
  </div>

</div>

<script>
  $('#program6').DataTable({
    scrollY: 350,
    // "columns": [{
    //     "width": "5%"
    //   },
    //   {
    //     "width": "20%"
    //   },
    //   {
    //     "width": "30%"
    //   },
    //   {
    //     "width": "10%"
    //   },
    //   {
    //     "width": "10%"
    //   },
    //   {
    //     "width": "10%"
    //   },
    //   {
    //     "width": "15%"
    //   },
    // ]
  });
</script>