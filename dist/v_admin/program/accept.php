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
                  <th>Pengaju</th>
                  <th>Keterangan</th>
                  <th>Donasi</th>
                  <th>Piihan</th>
                </tr>
              </center>
            </thead>
            <tbody>
            <?php
            $a = SelectAllProg();
            $no = 1;
            foreach ($a as $key => $value) {
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $value['kdProgram']; ?></td>
                    <td><?php echo $value['nmProgram']; ?></td>
                    <td>
                    <?php 
                    if ($value['idLevel'] == '1'){
                    ?>
                      Lembaga
                    <?php 
                    }else {
                      ?>
                      Perseorangan
                    <?php
                    }
                    ?>
                    </td>
                    <td><?php echo $value['keterangan']; ?></td>
                    <td><?php echo $value['donasi']; ?></td>

                    <td>
                      <?php
                      if ($value['status'] == 'T') {
                      ?>
                        <a href="?page=progKonfirm&kode=<?php echo $value['id']; ?>" class='btn btn-warning btn-sm'><i class="fa fa-check"></i></a>
                        <a href="?page=progDet&kode=<?php echo $value['id']; ?>" class='btn btn-success btn-sm'><i class="fa fa-eye"></i></a>
                        <a href="?page=progAksi&kode=<?php echo $value['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
                      <?php
                      } else {
                      ?>
                        <a href="?page=progArchive&kode=<?php echo $value['id']; ?>" class='btn btn-success btn-sm'><i class="fa fa-archive"></i></a>
                        <a href="?page=progDet&kode=<?php echo $value['id']; ?>" class='btn btn-success btn-sm'><i class="fa fa-eye"></i></a>
                        <a href="?page=progAksi&kode=<?php echo $value['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
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