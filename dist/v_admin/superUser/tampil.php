<?php 
     include_once("../koneksi.php");
    ?>
<!-- <h4><span class="glyphicon glyphicon-briefcase"></span>Yayasan SMK NU Ma'arif Kudus</h4> -->
<div class="form-group">

<br>
<div class="card mb-3">
<div class="card-header">
<a data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm">Tambah Data Pengguna</a> </div>
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
        <th>Nama Pengguna</th>
        <th>Username</th>
        <th>Lembaga</th>
        <th>Level</th>
        <th>Status</th>
        <th></th>
    </tr>
    </center>
    </thead>
    <tbody>
    
        <?php
            
            $sql_tampil = "SELECT a.id, a.nama, a.username, a.idLembaga, b.nmLembaga, a.level, a.status FROM super_user a, lembaga b WHERE a.idLembaga=b.id OR a.idLembaga ='0'";
            $query_tampil = mysqli_query($con, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
        <tr>       
            <td><?php echo $no; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['username']; ?></td>
            <td>
            <?php
               if($data['idLembaga'] == '0'){
              ?> Administrator Sistem
              <?php
              } else {
                ?>
            <?php echo $data['nmLembaga']; ?>
            </td>
            <?php
              }
              ?>
            <td><?php echo $data['level']; ?></td>
            <td><?php echo $data['status']; ?></td>
          
            <td>
            <?php
               if($data['status'] == 'Aktif'){
              ?>
                <a href="?page=supUbah&kode=<?php echo $data['id']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
                <a href="?page=supAksi&kode=<?php echo $data['id']; ?>"onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
              <?php
              } else {
                ?>
                <a href="?page=supKonfirm&kode=<?php echo $data['id']; ?>"onclick="return confirm('Aktifkan User ini ?')" class='btn btn-success btn-sm'><i class="fa fa-check"></i></i></a>
                <a href="?page=supUbah&kode=<?php echo $data['id']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
                <a href="?page=supAksi&kode=<?php echo $data['id']; ?>"onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
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
  <div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Super User</h4>
			</div>
			<div class="modal-body">
                <form action="?page=supAksi" method="post" enctype="multipart/form-data">
					
                <div class="form-group">
                    <label>Nama Pengguna</label>
                    <input type="text" class="form-control" name="txtNm"/>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="txtUsername"/>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="txtPassword"/>
                </div>

                <div class="form-group">
										<label>Lembaga</label>
										<select name="txtIdLembaga" class="form-control">
											<option value="">- Lembaga -</option>
											<?php
											$p = mysqli_query($con, "select id , nmLembaga from lembaga") or die(mysqli_error($con));
											while ($datap = mysqli_fetch_array($p)) {
												echo '<option value="' . $datap['id'] . '">' . $datap['nmLembaga'] . '</option>';
											} ?>
										</select>
									</div>

                <div class="form-group">
                  <label>Level</label>
                  <select name="txtLevel" class="form-control">
                    <option value="">- Level User -</option>
                    <option value="0">Super Admin</option>
                    <option value="1">Ketua Sie.</option>
                    <option value="2">Sekretaris Sie.</option>
                    <option value="3">Ketua Lembaga</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Status</label>
                  <select name="txtStatus" class="form-control">
                    <option value="">- Level User -</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Nonaktif">Nonaktif</option>
                  </select>
                </div>
          
              </div>
                
				<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" name="btnSimpan">Simpan</button>
				</div>
			</form>
        </div>