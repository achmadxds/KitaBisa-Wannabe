<?php
include_once("koneksi.php");
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT id, nama, username, password, status FROM user WHERE id='".$_GET['kode']."'";
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
        Ubah Data Pengguna Perseorangan
        </div>
        <div class="card-body">
        <form class="form-horizontal" action="?page=usrAksi" method="post" enctype="multipart/form-data">
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
            value="<?php echo $data_cek['username']; ?>" required="" >
            </div>
        </div>

        <div class="form-group">
        <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-8">
                <input type="password" class="form-control"  name="txtpassword" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
                value="<?php echo $data_cek['password']; ?>" required="">
            </div>
        </div>

        
        <div class="box-footer">
            <button type="submit" class="btn btn-success btn-sm" name="btnUBAH">UBAH</button>
            <a href="?page=user" class='btn btn-danger btn-sm'>BATAL</a>
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
