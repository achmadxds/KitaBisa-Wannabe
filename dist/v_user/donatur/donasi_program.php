<?php include_once("../../koneksi.php"); ?>

<div id="main">
  <header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
      <i class="bi bi-justify fs-3"></i>
    </a>
  </header>

  <div class="page-heading">
    <h3>List Program</h3>
  </div>

  <div class="page-content">
    <section class>
      <div class="row">
        <div class="card" style="background-color: khaki;">
          <div class="card-body">
            <div class="row">
              <?php
              if($_GET['an']) {
                $a = getProgamByUSERS($_GET['an']);
              }
              foreach ($a as $key => $value) {
              ?>
                <div class="col-4">
                  <div class="card">
                    <a href="#" data-bs-toggle="modal" onclick="Clicked(this)" data-bs-target="#myModal" data-kd="<?php echo $value['kode'] ?>" data-nm="<?php echo $value['nmProgram'] ?>" data-id="<?php echo $value['id'] ?>" data-so="<?php echo $value['no_rek'] ?>" data-si="<?php echo $value['namaAtas'] ?>" >
                      <div class="card-body"> 
                        <h5 class="text-center pb-2"><?php echo $value['nmProgram'] ?></h5>
                        <img src="__DIR__ . /../../../images/files/<?php echo $value['gambar'] ?>" alt="" width="100%" height="150px">
                      </div>
                    </a>
                  </div>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="?level=donatur&page=aksiTambah" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <h2 class="text-center">Kirim Donasi</h2>
          <hr>
          <div class="form-group">
            <input type="hidden" name="idDonaturDonasi" value="<?php echo $_SESSION["ses_id"]; ?>" />
            <input type="hidden" name="idProgramDonasi" id="idProgramDonasi" />
            <input type="hidden" class="form-control" name="kdProgramDonasi" id="kdProgramDonasi" readonly />
          </div>
          <div class="form-group">
            <label>Nama Program</label>
            <input type="text" class="form-control" name="nmProgramDonasi" id="nmProgramDonasi" readonly />
          </div>

          <div class="form-group">
            <label>Nama Donatur</label>
            <input type="text" class="form-control" value="<?php echo $_SESSION["ses_nama"]; ?>" readonly />
          </div>
          <div class="form-group">
            <label>No Rekening</label>
            <input type="text" class="form-control" name="nmProgramDonasi" id="no_rek" placeholder="5570865" readonly />
          </div>
          <div class="form-group">
            <label>Atas Nama</label>
            <input type="text" class="form-control" name="" id="hatasNama" readonly />
          </div>
          <div class="form-group">
            <label>Donasi</label>
            <input type="text" class="form-control" name="dnProgramDonasi" placeholder="Rp. 5000" />
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="btnSimpanDonasi">Donasi</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function Clicked(param) {
    $('#kdProgramDonasi').val($(param).data('kd'))
    $('#nmProgramDonasi').val($(param).data('nm'))
    $('#idProgramDonasi').val($(param).data('id'))
    console.log($(param).data('id'))
    $('#no_rek').val($(param).data('so'))
    $('#hatasNama').val($(param).data('si'))
    // $(param).data('so')
    // $(param).data('si')
  }
</script>