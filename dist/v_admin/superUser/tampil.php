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
			<a data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary btn-sm">Tambah Data Pengguna</a>
	</div>
	<br>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					Kelola Super User
				</div>
				<div class="card-body">
					<table class="table table-striped" id="table1">
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
            $a = showUserSuper();
            $no = 1;
            foreach ($a as $key => $data) {
        ?>
        <tr>       
            <td><?php echo $no; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['username']; ?></td>
            <td>
            <?php
               if($data['idDaftar'] == '0'){
              ?> Administrator Sistem
              <?php
              } else {
                ?>
            <?php echo $data['nmLembaga']; ?>
            </td>
            <?php
              }
              ?>
            <td><?php echo $data['level'];?>   </td>
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
				</div>
			</div>
		</div>
	</div>
</div>

</section>
</div>

  <div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
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
										<label>Organisasi</label>
										<select name="txtIdDaftar" class="form-control">
											<option value="">- Organisasi -</option>
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
                    <option value="admin">Super Admin</option>
                    <option value="O-pimpinan">Organisasi Lembaga.</option>
                    <option value="O-admin">Organisasi Lembaga</option>
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