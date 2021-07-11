<?php
include_once("../koneksi.php");
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM user WHERE id='".$_GET['kode']."'";
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
					<h3 class="box-title">Ubah Data Pengguna</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove">
							<i class="fa fa-remove"></i>
						</button>
					</div>
				</div>
<form class="form-horizontal" action="?page=usrPrgAksi" method="post" enctype="multipart/form-data">
    <div class="box-body">

        <input type="hidden" class="form-control"  name="txtId" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['id']; ?>" required="" readonly="">


        <div class="form-group">
            <label class="col-sm-2 control-label">Nama Pengguna</label>
            <div class="col-sm-8">
            <input type="text" class="form-control"  name="txtNm" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['nama']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Username</label>
            <div class="col-sm-8">
            <input type="text" class="form-control"  name="txtUsername" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['username']; ?>" required="" readonly="">
            </div>
        </div>

        <div class="form-group">
        <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-8">
                <input type="password" class="form-control"  name="txtNmProgram" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
                value="<?php echo $data_cek['nmProgram']; ?>" required="">
            </div>
        </div>

        
        <div class="box-footer">
            <button type="submit" class="btn btn-success btn-sm" name="btnUBAH">UBAH</button>
            <a href="?page=super" class='btn btn-danger btn-sm'>BATAL</a>
        </div>
        </div>
</form>
</div>
</section>
