<?php
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM mst_jenis WHERE id='".$_GET['kode']."'";
        $query_cek = mysqli_query($con, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Balas Pesan</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove">
							<i class="fa fa-remove"></i>
						</button>
					</div>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
        <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
					<div class="box-body">
          <input type="hidden" class="form-control"  name="txtId" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['id']; ?>" required="">

              <div class="form-group">
              <label class="col-sm-2 control-label">Nama Anggota</label>
              <div class="col-sm-5">
                <input class="form-control" name="id_pengaduan" value="<?php echo $data_cek['nmAnggota']; ?>"
                  readonly/>
              </div>
              </div>

              <div class="form-group">
              <label class="col-sm-2 control-label">Pesan</label>
              <div class="col-sm-8">
                  <input class="form-control" name="txtIsi" value="<?php echo $data_cek['isi']; ?>" readonly/>
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Balasan</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="txtBalasan" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"/>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label"> Jenis </label>
                  <div class="col-sm-8">
                      <select name="txtJenis" class="form-control" required>
                      <option value=""> - Jenis -</option>
                      <option value="1">Lembaga</option>
                      <option value="0">Perseorangan</option>
                      </select>
                      </div>
                  </div>

                </div>
                <input type="hidden" name="txtAdmin" value="<?php echo $data_pengguna; ?>" readonly/>
						<div class="box-footer">
							<!-- <input type="submit" name="btnSimpan" value="Balas" class="btn btn-success"> -->
              <button type="submit" class="btn btn-primary" name="Ubah">Balas</button>
							<a href="?page=jenis" title="Kembali" class="btn btn-warning">Batal</a>
						</div>
				</form>
				</div>
				<!-- /.box -->
</section>


<?php

if (isset ($_POST['Ubah'])){
    //mulai proses ubah
        
        $sql_ubah = "UPDATE jenis SET
        nama='".$_POST['txtNama']."'
        WHERE id='".$_POST['txtId']."'";
        $query_ubah = mysqli_query($con, $sql_ubah);
    if ($query_ubah) {
        echo "<script>alert('Jenis Terubah')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=jenis'>";
      }else{
        echo "<script>alert('Jenis Gagal Ubah')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=jenis'>";
    }

    //selesai proses ubah
    
}

?>
