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
              Kelola Dana
            </div>
            <div class="card-body">
              <table class="table table-striped" id="table111">
                <thead>
                  <center>
                    <tr>
                      <th>No</th>
                      <th>Kode Program</th>
                      <th>Nama Program</th>
                      <th>Dana Target</th>
                      <th>Dana Masuk</th>
                      <th>Dana Tidak Tercapai</th>
                      <th></th>
                    </tr>
                  </center>
                </thead>
                <tbody>

                  <?php

                  $sql_tampil = "SELECT a.id, b.kdProgram, b.nmProgram, b.donasi , SUM(a.nominal) AS Total, b.donasi - SUM(a.nominal) AS Tidak  FROM transaksi a, program b WHERE a.idProgram=b.id AND a.status='K' AND b.idLembaga='$data_id' AND b.idLevel='2'";
                  $query_tampil = mysqli_query($con, $sql_tampil);
                  $no = 1;
                  while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
                  ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['kdProgram']; ?> <br>

                      </td>
                      <td><?php echo $data['nmProgram']; ?></td>
                      <td><?php echo $data['donasi']; ?></td>
                      <td><?php echo $data['Total']; ?></td>
                      <td><?php echo $data['Tidak']; ?></td>

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
  console.log($('#table111'))
  $('#table111').DataTable({
  });
</script>