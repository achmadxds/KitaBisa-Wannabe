<?php
include_once("koneksi.php");
// KODE OTOMATIS
// membuat query max untuk kode
$carikode = mysqli_query($con, "SELECT MAX(id) FROM program") or die('error');
// menjadikannya array
$datakode = mysqli_fetch_array($carikode);
// jika $datakode
if ($datakode) {
  // var_dump($datakode);
  // membuat variabel baru untuk mengambil kode mulai dari 3
  $nilaikode = $datakode[0];
  // menjadikan $nilaikode ( int )
  $kode = (int) $nilaikode;
  // setiap $kode di tambah 1
  $kode = $kode + 1;
  
  $hasilkode = "PLDN" . str_pad($kode, 2, "0", STR_PAD_LEFT);
} else {
  $hasilkode = "PLDN01";
}
?>

<style>
  .card {
    border: 1px solid #ccc;
    background-color: #f4f4f4;
    padding: 20px;
    margin-bottom: 10px;
  }
</style>


<div id="main">
<header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    
    <div class="page-content">
        <section class>
        <a data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary btn-sm">Tambah Data Program</a> </div>
        <br>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        
                        
                        <?php
                      $sql_tampil = "SELECT a.id, a.kdProgram, a.gambar, a.nmProgram, b.nmLembaga, a.keterangan, a.donasi, a.status, b.no_rek FROM program a, lembaga b WHERE a.idLembaga=b.id AND a.idLembaga='$data_id'";
                      $query_tampil = mysqli_query($con, $sql_tampil);
                      $no = 1;
                      while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
                        $photoDir = 'kitabisa-wannabe/images/files/' . $data['gambar'];
                        ?>
                          <div class="col-sm-5">
                            <div  style="width: 44rem;">
                              <img src="<?php echo $photoDir ?>" width="390" height="280">
                              <div class="card-body">
                                <h5 class="card-title"><b><?php echo $data['nmProgram']; ?></b></h5>
                                <p class=""><?php echo $data['keterangan']; ?></p>
                                <a href="?page=progUbah&kode=<?php echo $data['id']; ?>" class='btn btn-warning'>Edit<i class="fa fa-edit"></i></a>
                                <a href="?page=progAksi&kode=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger'>Delete<i class="fa fa-trash"></i></i></a>
                              
                            </div>
                          </div>
                        <?php
            }
            $no++;
          ?>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    </section>
</div>

<div id="myModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Tambah Program</h4>
          </div>
          <form action="?page=progAksi" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                <label>Kode Program</label>
                <input type="text" class="form-control" name="txtKdProgram" value="<?php echo $hasilkode; ?>" readonly />
              </div>
              <div class="form-group">
                <label>Nama Program</label>
                <input type="text" class="form-control" name="txtNmProgram" />
              </div>

              <div class="form-group">
                <label>Foto Program</label>
                <input type="file" class="form-control" name="txtfotoProgram" />
              </div>

              <div class="form-group">
                <label>Lembaga</label>
                <select name="txtIdLembaga" class="form-control">
                  <option value="">- Lembaga -</option>
                  <?php
                  $p = mysqli_query($con, "select id , nmLembaga from lembaga where id='$data_id'") or die(mysqli_error($con));
                  while ($datap = mysqli_fetch_array($p)) {
                    echo '<option value="' . $datap['id'] . '">' . $datap['nmLembaga'] . '</option>';
                  } ?>
                </select>
              </div>

              <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" name="txtketerangan" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required />
                </textarea>
              </div>

              <div class="form-group">
                <label>Donasi</label>
                <input type="text" class="form-control" name="txtDonasi" />
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary" name="btnSimpan">Simpan</button>
            </div>
          </form>
        </div>
      </div>
  </div>