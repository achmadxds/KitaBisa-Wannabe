<?php
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM mst_jenis WHERE id='".$_GET['kode']."'";
        $query_cek = mysqli_query($con, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="page-content">
  <section class="row">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            Master Jenis
          </div>
          <div class="card-body">
            <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="box">
                  <input type="hidden" class="form-control" name="txtId" oninvalid="InvalidMsg(this);"
                    oninput="InvalidMsg(this);" value="<?php echo $data_cek['id']; ?>" required="">

                  <div class="form-group ">
                    <label class="col-sm-2 control-label">Nama jenis</label>
                    <div class="col-sm-5">
                      <input class="form-control" name="id_pengaduan" value="<?php echo $data_cek['nama']; ?>"
                        readonly />
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Pesan</label>
                    <div class="col-sm-8">
                      <input class="form-control" name="txtIsi" value="<?php echo $data_cek['jenis']; ?>" readonly />
                    </div>
                  </div>

                </div>
                <div class="box-footer">
                  <!-- <input type="submit" name="btnSimpan" value="Balas" class="btn btn-success"> -->
                  <button type="submit" class="btn btn-primary" name="Ubah">Balas</button>
                  <a href="?page=jenis" title="Kembali" class="btn btn-warning">Batal</a>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
</div>

</section>
</div>