<?php
include_once("../koneksi.php");
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM perseorangan WHERE id='".$_GET['kode']."'";
        $query_cek = mysqli_query($con, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
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
        <form class="form-horizontal" action="?page=prsgAksi" method="post" enctype="multipart/form-data">
    <div class="box-body">

        <input type="hidden" class="form-control"  name="txtId" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['id']; ?>" required="" readonly="">

            <?php echo $data_cek['id']; ?>

        <div class="form-group">
            <label class="col-sm-2 control-label">Kode Perseorangan </label>
            <div class="col-sm-8">
            <input type="text" class="form-control"  name="txtKd" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['kdPerseorangan']; ?>" required="" readonly="">
            </div>
        </div>

        <div class="form-group">
        <label class="col-sm-2 control-label">Nama </label>
            <div class="col-sm-8">
                <input type="text" class="form-control"  name="txtNm" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
                value="<?php echo $data_cek['nama']; ?>" required="">
            </div>
        </div>

        <div class="form-group" >
        <label class="col-sm-2 control-label">Jenis Kelamin</label>
            <div class="col-sm-8">
            <select name="txtJenis" class="form-control" required>
            <option value="<?php echo $data_cek['jenis']; ?>"> - Jekel -</option>
            <option value="P">Perempuan</option>
            <option value="L">Laki-Laki</option>
            </select>
            </div>
        </div>

        <div class="form-group">
        <label class="col-sm-2 control-label">Alamat </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="txtAlamat" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
                value="<?php echo $data_cek['alamat']; ?>"  required="">
            </div>
        </div>

        <div class="form-group">
        <label class="col-sm-2 control-label">No HP </label>
            <div class="col-sm-8">
            <input type="text" class="form-control" name="txtNoHp" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['no_hp']; ?>"  required="">
            </div>
        </div>

        <div class="form-group">
        <label class="col-sm-2 control-label">No Rekening </label>
            <div class="col-sm-8">
            <input type="text" class="form-control" name="txtNoRek" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['no_rek']; ?>"  required="">
            </div>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-success btn-sm" name="btnUBAH">UBAH</button>
            <a href="?page=prsg" class='btn btn-danger btn-sm'>BATAL</a>
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

