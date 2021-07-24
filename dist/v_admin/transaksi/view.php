<?php
include_once("koneksi.php");

?>
<!-- <h4><span class="glyphicon glyphicon-briefcase"></span>Yayasan SMK NU Ma'arif Kudus</h4> -->
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    
    <div class="page-content">
        <section class>
        
        <br>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            Dana Masuk
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
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
                        <a href="?page=danaKonfirm&kode=<?php echo $data['id']; ?>" class='btn btn-warning btn-sm'><i class="fa fa-check"></i></a>
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
    </div>

    </section>
</div>