<?php
include_once("__DIR__ .  ../../../../koneksi.php");
if (isset($_GET['kode'])) {
  $data = GetDataProgramByID($_GET['kode']);
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
          Ubah Data Program
        </div>
        <div class="card-body">
          <form class="form-horizontal" action="?level=perseorangan&page=programSave" method="post" enctype="multipart/form-data">
            <div class="box-body">

              <input type="hidden" class="form-control" name="txtId" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" value="<?php echo $data  ['id']; ?>" required="" readonly="">

              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Program </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="txtKdProgram" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" value="<?php echo $data ['kdProgram']; ?>" required="" readonly="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Program </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="txtNmProgram" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" value="<?php echo $data ['nmProgram']; ?>" required="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Lembaga</label>
                <div class="col-sm-8">
                  <select name="txtIdLembaga" class="form-control" required>
                    <option value="<?php echo $data ['idLembaga']; ?>"> - Lembaga -</option>
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
                  <input type="text" class="form-control" name="txtKeterangan" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" value="<?php echo $data  ['keterangan']; ?>" required="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Donasi </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="txtDonasi" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" value="<?php echo $data  ['donasi']; ?>" required="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Berakhir </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="txtAkhir" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" value="<?php echo $data ['tgl_akhir']; ?>" required="">
                </div>
              </div>


              <div class="box-footer">
                <button type="submit" class="btn btn-success " name="btnUBAH">UBAH</button>
                <a href="index.php?level=perseorangan&page=program" class='btn btn-danger'>BATAL</a>
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