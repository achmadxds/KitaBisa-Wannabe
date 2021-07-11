<?php
include_once("../koneksi.php");
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM donatur WHERE id='".$_GET['kode']."'";
        $query_cek = mysqli_query($con, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Ubah Data Donatur</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove">
							<i class="fa fa-remove"></i>
						</button>
					</div>
				</div>
<form class="form-horizontal" action="?halaman=progAksi" method="post" enctype="multipart/form-data">
    <div class="box-body">

        <input type="hidden" class="form-control"  name="txtId" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['id']; ?>" required="" readonly="">

        <div class="form-group">
            <label class="col-sm-2 control-label">Kode Lembaga </label>
            <div class="col-sm-8">
            <input type="text" class="form-control"  name="txtKdLembaga" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['kdLembaga']; ?>" required="" readonly="">
            </div>
        </div>

        <div class="form-group">
        <label class="col-sm-2 control-label">Nama Lembaga </label>
            <div class="col-sm-8">
                <input type="text" class="form-control"  name="txtNmLembaga" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
                value="<?php echo $data_cek['nmLembaga']; ?>" required="">
            </div>
        </div>

        <div class="form-group" >
        <label class="col-sm-2 control-label">Lembaga</label>
            <div class="col-sm-8">
            <select name="txtJenis" class="form-control" required>
            <option value="<?php echo $data_cek['jenis']; ?>"> - Jenis -</option>
            <option value="Sosial">Sosial</option>
            <option value="Bencana">Bencana</option>
            <option value="Yatim-Lansia">Yatim / Lansia</option>
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
        <label class="col-sm-2 control-label">Pimpinan </label>
            <div class="col-sm-8">
            <input type="text" class="form-control" name="txtNmPimpinan" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['nmPimpinan']; ?>"  required="">
            </div>
        </div>

        <div class="form-group">
        <label class="col-sm-2 control-label">No HP </label>
            <div class="col-sm-8">
            <input type="text" class="form-control" name="txtNoHp" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['no_hp']; ?>"  required="">
            </div>
        </div>

        <input type="hidden" class="form-control"  name="txtTgl" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['tgl']; ?>">

        <div class="box-footer">
            <button type="submit" class="btn btn-success btn-sm" name="btnUBAH">UBAH</button>
            <a href="?page=lembaga" class='btn btn-danger btn-sm'>BATAL</a>
        </div>
        </div>
</form>
</div>
</section>
