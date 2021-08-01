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
                           Donatur
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                            <thead>
    <center>
      <tr>
        <th>No</th>
        <th>Donatur</th>
        <th>Alamat</th>
        <th>No Hp</th>
        <th>Tanggal Reg</th>
        <th>Status</th>
        <th></th>
    </tr>
    </center>
    </thead>
    <tbody>
    
        <?php
            $a = SelectAllDonatur();
            $no = 1;
            foreach ($a as $key => $value) {
                ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $value['nama']; ?></td>
            <td><?php echo $value['alamat']; ?></td>
            <td><?php echo $value['no_hp']; ?></td>
            <td><?php echo $value['tgl_daftar']; ?></td>
            <td><?php echo $value['status']?></td>
            
            <td>
            <?php
               if($value['status'] == 'Aktif'){
              ?>
              <a href="?page=donUbah&kode=<?php echo $value['id']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
              <a href="?page=donAksi&kode=<?php echo $value['id']; ?>"onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
              <?php
              } else {
                ?>
                <a href="?page=donAcc&kode=<?php echo $value['id']; ?>"class='btn btn-success btn-sm'><i class="fa fa-check"></i></a>
                <a href="?page=donAksi&kode=<?php echo $value['id']; ?>"onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
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