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
                            Program Terdaftar
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                            <thead>
              <center>
                <tr>
                  <th>No</th>
                  <th>Kode Program</th>
                  <th>Nama Program</th>
                  <th>Lembaga</th>
                  <th>Keterangan</th>
                  <th>Donasi</th>
                  <th>Piihan</th>
                </tr>
              </center>
            </thead>
            <tbody>

              <?php

                $sql_tampil = "SELECT a.id, a.kdProgram, a.nmProgram, b.nmLembaga, a.keterangan, a.donasi, a.status FROM program a, lembaga b WHERE a.idLembaga=b.id AND (a.status='T' or a.status='P')";
                $query_tampil = mysqli_query($con, $sql_tampil);
                $no = 1;
                while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['kdProgram']; ?></td>
                    <td><?php echo $data['nmProgram']; ?></td>
                    <td><?php echo $data['nmLembaga']; ?></td>
                    <td><?php echo $data['keterangan']; ?></td>
                    <td><?php echo $data['donasi']; ?></td>

                    <td>
                      <?php
                      if ($data['status'] == 'T') {
                      ?>
                        <a href="?page=progKonfirm&kode=<?php echo $data['id']; ?>" class='btn btn-warning btn-sm'><i class="fa fa-check"></i></a>
                        <a href="?page=progDet&kode=<?php echo $data['id']; ?>" class='btn btn-success btn-sm'><i class="fa fa-eye"></i></a>
                        <a href="?page=progAksi&kode=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
                      <?php
                      } else {
                      ?>
                        <a href="?page=progArchive&kode=<?php echo $data['id']; ?>" class='btn btn-success btn-sm'><i class="fa fa-archive"></i></a>
                        <a href="?page=progDet&kode=<?php echo $data['id']; ?>" class='btn btn-success btn-sm'><i class="fa fa-eye"></i></a>
                        <a href="?page=progAksi&kode=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
                      <?php
                      }
                      ?>
                      <!-- <a href="?halaman=balas&kode=<?php echo $data['idKonsul']; ?>"class='btn btn-success btn-sm'>Balas</a> -->
                      <!-- <a data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm">Balas</a> -->
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