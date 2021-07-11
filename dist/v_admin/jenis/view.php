<?php 
     include_once("../koneksi.php");
    ?>
<!-- <h4><span class="glyphicon glyphicon-briefcase"></span>Yayasan SMK NU Ma'arif Kudus</h4> -->
<div class="form-group">

<br>
<div class="card mb-3">
<div class="card-header">
<a data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm">Tambah Jenis</a> </div>
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
<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
    <center>
      <tr>
        <th>No</th>
        <th>Jenis</th>
        <th></th>
    </tr>
    </center>
    </thead>
    <tbody>
    
        <?php
            $sql_tampil = "SELECT * FROM mst_jenis";
            $query_tampil = mysqli_query($con, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
        <tr>       
            <td><?php echo $no; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td>
            <a href="?page=jnsUbah&kode=<?php echo $data['id']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
            <a href="?page=jnsAksi&kode=<?php echo $data['id']; ?>"onclick="return confirm('Hapus Jenis ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
            </td>
        </tr>
        <?php
            $no++;
            }
        
        ?>
    </tbody>
  </table>
  <div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Jenis</h4>
			</div>
			<div class="modal-body">
                <form action="?page=jnsAksi" method="post" enctype="multipart/form-data">
					
                <div class="form-group">
                    <label>Jenis Donasi</label>
                    <input type="text" class="form-control" name="txtJenis"/>
                </div>
                <div class="form-group">
                    <label> Jenis </label>
                    <div>
                        <select name="txtPil" class="form-control" required>
                        <option value=""> - Jenis -</option>
                        <option value="1">Lembaga</option>
                        <option value="0">Perseorangan</option>
                        </select>
                    </div>
                </div>
              </div>
                
				<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" name="btnSimpan">Simpan</button>
				</div>
			</form>
        </div>

<?php

// if (isset ($_POST['btnSimpan'])){
//     //mulai proses ubah
        
//         $sql_ubah = "UPDATE jenis SET
//         nama='".$_POST['txtNama']."'
//         WHERE id='".$_POST['txtId']."'";
//         $query_ubah = mysqli_query($con, $sql_ubah);
//     if ($query_ubah) {
//         echo "<script>alert('Jenis Terubah')</script>";
//         echo "<meta http-equiv='refresh' content='0; url=index.php?page=jenis'>";
//       }else{
//         echo "<script>alert('Jenis Gagal Ubah')</script>";
//         echo "<meta http-equiv='refresh' content='0; url=index.php?page=jenis'>";
//     }

//     //selesai proses ubah
    
// }

?>
