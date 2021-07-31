<?php
include_once("koneksi.php");
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM donatur WHERE id='".$_GET['kode']."'";
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
        Ubah Data Donatur
        </div>
        <div class="card-body">
        <form class="form-horizontal" action="?page=donAksi" method="post" enctype="multipart/form-data">
    <div class="box-body">
        <input type="hidden" class="form-control"  name="txtId" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['id']; ?>" required="" readonly="">

        <div class="form-group">
            <label class="col-sm-2 control-label">Nama Donatur </label>
            <div class="col-sm-8">
            <input type="text" class="form-control"  name="txtNama" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['nama']; ?>" required="" >
            </div>
        </div>

        <div class="form-group" >
        <label class="col-sm-2 control-label">Jenis Kelamin</label>
            <div class="col-sm-8">
            <select name="txtJekel" class="form-control" required>
            <option value="<?php echo $data_cek['jekel']; ?>"> - Pria / Wanita -</option>
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
            <input type="text" class="form-control" name="txtNoHP" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['no_hp']; ?>"  required="">
            </div>
        </div>

        <div class="form-group">
        <label class="col-sm-2 control-label">ID CHAT </label>
            <div class="col-sm-8">
            <input type="text" class="form-control" name="txtidchat" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['id_chat']; ?>"  required="">
            </div>
        </div>

        <div class="form-group" >
        <label class="col-sm-2 control-label">Status</label>
            <div class="col-sm-8">
            <select name="txtStatus" class="form-control" required>
            <option value="<?php echo $data_cek['status']; ?>"> - <?php echo $data_cek['status']; ?> -</option>
            <option value="AKtif">Aktif</option>
            <option value="Nonaktif">Non Aktif</option>
            </select>
            </div>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-success btn-sm" name="btnUBAH">UBAH</button>
            <a href="?page=donatur" class='btn btn-danger btn-sm'>BATAL</a>
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