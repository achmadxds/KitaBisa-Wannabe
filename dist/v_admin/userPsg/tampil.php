<?php 
     include_once("../koneksi.php");
    ?>
<!-- <h4><span class="glyphicon glyphicon-briefcase"></span>Yayasan SMK NU Ma'arif Kudus</h4> -->
<div class="form-group">

<br>
<div class="card mb-3">
<div class="card-header">

<br>
<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Super User</h3>

  <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
    </button>
    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
  </div>
</div>
<div class="box-body" action="" method="POST" enctype="multipart/form-data">
<table id="example1" class="table table-bordered table-striped">
<thead>
    <center>
      <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama Perseorangan</th>
        <th>Username</th>
        <th>Status</th>
        <th></th>
    </tr>
    </center>
    </thead>
    <tbody>
    
        <?php
            
            $sql_tampil = "SELECT a.id, a.username, a.status, b.nama, b.kdPerseorangan FROM user a, perseorangan b WHERE a.kdUser=b.kdPerseorangan";
            $query_tampil = mysqli_query($con, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
        <tr>       
            <td><?php echo $no; ?></td>
            <td><?php echo $data['kdPerseorangan']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['username']; ?></td>
            <td><?php echo $data['status']; ?></td>
          
            <td>
            <?php
               if($data['status'] == 'Aktif'){
              ?>
                <a href="?page=usrPrgUbah&kode=<?php echo $data['id']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
              <?php
              } else {
                ?>
                <a href="?page=konfirmed&kode=<?php echo $data['id']; ?>"onclick="return confirm('Aktifkan User ini ?')" class='btn btn-success btn-sm'><i class="fa fa-check"></i></a>
                <a href="?page=usrUbah&kode=<?php echo $data['id']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
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
 