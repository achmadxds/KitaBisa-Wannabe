<?php
include_once("../koneksi.php");
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM program WHERE id='".$_GET['kode']."'";
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
        <form class="form-horizontal" action="?page=progAksi" method="post" enctype="multipart/form-data">
    <div class="box-body">

        <input type="hidden" class="form-control"  name="txtId" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['id']; ?>" required="" readonly="">

        <div class="form-group">
            <label class="col-sm-2 control-label">Kode Program </label>
            <div class="col-sm-8">
            <input type="text" class="form-control"  name="txtKdProgram" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['kdProgram']; ?>" required="" readonly="">
            </div>
        </div>

        <div class="form-group">
        <label class="col-sm-2 control-label">Nama Program </label>
            <div class="col-sm-8">
                <input type="text" class="form-control"  name="txtNmProgram" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
                value="<?php echo $data_cek['nmProgram']; ?>" required="">
            </div>
        </div>

        <div class="form-group" >
        <label class="col-sm-2 control-label">Lembaga</label>
            <div class="col-sm-8">
            <select name="txtIdLembaga" class="form-control" required>
            <option value="<?php echo $data_cek['idLembaga']; ?>"> - Lembaga -</option>
            <?php
                $p = mysqli_query($con, "select id , nmLembaga from lembaga") or die(mysqli_error($con));
                while ($datap = mysqli_fetch_array($p)) {
                    echo '<option value="' . $datap['id'] . '">' . $datap['nmLembaga'] . '</option>';
                } ?>
            </select>
            </div>
        </div>

        <div class="form-group">
        <label class="col-sm-2 control-label">Keterangan </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="txtKeterangan" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
                value="<?php echo $data_cek['keterangan']; ?>"  required="">
            </div>
        </div>

        <div class="form-group">
        <label class="col-sm-2 control-label">Donasi </label>
            <div class="col-sm-8">
            <input type="text" class="form-control" name="txtDonasi" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['donasi']; ?>"  required="">
            </div>
        </div>

        
        <div class="box-footer">
            <button type="submit" class="btn btn-success btn-sm" name="btnUBAH">UBAH</button>
            <a href="?page=prog" class='btn btn-danger btn-sm'>BATAL</a>
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