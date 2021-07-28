<?php
if (isset($_GET['kode'])) {
  $sql_cek = "SELECT * FROM mst_jenis WHERE id='" . $_GET['kode'] . "'";
  $query_cek = mysqli_query($con, $sql_cek);
  $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>
<div id="main">
  <header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
      <i class="bi bi-justify fs-3"></i>
    </a>
  </header>


  <div class="page-content">
    <section class>
    
  </div>
  <br>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          Master Jenis
        </div>
        <div class="card-body">
        <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
					<div class="box-body">
          <input type="hidden" class="form-control"  name="txtId" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['id']; ?>" required="">

              <div class="form-group">
              <label class="col-sm-2 control-label">Nama Anggota</label>
              <div class="col-sm-5">
                <input class="form-control" name="txtNama" value="<?php echo $data_cek['nama']; ?>"
                  />
              </div>
              </div>

                 <div class="form-group">
                  <label class="col-sm-2 control-label"> Jenis </label>
                  <div class="col-sm-8">
                      <select name="txtJenis" class="form-control" required>
                      <option value="<?php echo $data_cek['jenis']; ?>"> - Jenis -</option>
                      <option value="1">Lembaga</option>
                      <option value="0">Perseorangan</option>
                      </select>
                      </div>
                  </div>

                </div>
                <input type="hidden" name="txtid" value="<?php echo $$data_cek['id']; ?>" readonly/>
						<div class="box-footer">
							<!-- <input type="submit" name="btnSimpan" value="Balas" class="btn btn-success"> -->
              <button type="submit" class="btn btn-primary" name="Ubah">Balas</button>
							<a href="?page=jenis" title="Kembali" class="btn btn-warning">Batal</a>
						</div>
				</form>
        </div>
      </div>
    </div>
  </div>
</div>

</section>
</div>