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
  <h3 class="box-title">Donatur</h3>

  <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
    </button>
    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
  </div>
</div>
<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
    <center>
      <tr>
        <th>No</th>
        <th>Donatur</th>
        <th>Alamat</th>
        <th>No Hp</th>
        <th>Alamat</th>
        <th>Tanggal Reg</th>
        <th>Status</th>
        <th></th>
    </tr>
    </center>
    </thead>
    <tbody>
    
        <?php
            
            $sql_tampil = "SELECT * FROM donatur";
            $query_tampil = mysqli_query($con, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
        <tr>       
            <td><?php echo $no; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['jekel']; ?></td>
            <td><?php echo $data['alamat']; ?></td>
            <td><?php echo $data['no_hp']; ?></td>
            <td><?php echo $data['tgl_daftar']; ?></td>
            <td><?php echo $data['status']?></td>
            
            <td>
            <?php
               if($data['status'] == 'Aktif'){
              ?>
              <a href="?page=donUbah&kode=<?php echo $data['id']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
              <?php
              } else {
                ?>
                <a href="?page=donAcc&kode=<?php echo $data['id']; ?>"class='btn btn-success btn-sm'><i class="fa fa-check"></i></a>
                <a href="?page=donAksi&kode=<?php echo $data['id']; ?>"onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
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
  