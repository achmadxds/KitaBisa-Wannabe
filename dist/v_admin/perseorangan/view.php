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
  <h3 class="box-title">Donasi Perseorangan</h3>

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
        <th>ID</th>
        <th>Nama</th>
        <th>Jekel</th>
        <th>Alamat</th>
        <th>No Hp</th>
        <th>Rekening</th>
        <th></th>
    </tr>
    </center>
    </thead>
    <tbody>
    
        <?php
            $sql_tampil = "SELECT * FROM perseorangan";
            $query_tampil = mysqli_query($con, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
        <tr>       
            <td><?php echo $no; ?></td>
            <td><?php echo $data['kdPerseorangan']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td>
                <?php
                if ($data['jekel']== 'P'){
                ?>
                Perempuan
                <?php 
                }else{
                ?>
                Laki-Laki
                </td>
                <?php 
                }?>
            <td><?php echo $data['alamat']; ?></td>
            <td><?php echo $data['no_hp']; ?></td>
            <td><?php echo $data['no_rek']; ?></td>

            <td>
                    <a href="?page=prsgUbah&kode=<?php echo $data['id']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
                    <a href="?page=prsgDet&kode=<?php echo $data['id']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-eye"></i></a>
                    <a href="?page=prsgAksi&kode=<?php echo $data['id']; ?>"onclick="return confirm('Hapus Perseorangan ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
            </td>
        </tr>
        <?php
            $no++;
            }
        
        ?>
    </tbody>
  </table>
  