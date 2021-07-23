<?php
include_once("koneksi.php");
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
        <br>
            <div class="row">
                <div class="col-5">
                    <div class="card">
                      <?php
                      $sql_tampil = "SELECT a.id, a.kdProgram, a.gambar, a.nmProgram, b.nmLembaga, a.keterangan, a.donasi, a.status, b.no_rek FROM program a, lembaga b WHERE a.idLembaga=b.id AND a.status='P'";
                      $query_tampil = mysqli_query($con, $sql_tampil);
                      $no = 1;
                      while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
                        $photoDir = '../../images/' . $data['gambar'];
                        ?>
                          <div class="col-sm-5">
                            <div  style="width: 44rem;">
                              <img src="<?php echo $photoDir ?>" width="200" height="90">
                              <div class="card-body">
                                <h5 class="card-title"><b><?php echo $data['nmProgram']; ?></b></h5>
                                <p class=""><?php echo $data['keterangan']; ?></p>
                                <!-- <a href="#" class='btn btn-warning'><i class="fa fa-edit">Donasi</i></a> -->
                                <a data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary btn-sm">Donasi</a> </div>
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
            <h4 class="modal-title">Kirim Donasi</h4>
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
                <label>Nama Donatur</label>
                <input type="text" class="form-control" name="txtNmProgram" value="<?php echo $idPengguna?>"
                placeholder="NAMA Donatur" readonly/>
              </div>
              <div class="form-group">
                <label>Donasi</label>
                <input type="text" class="form-control" name="txtDonasi" placeholder="Rp." />
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary" name="btnSimpan">Donasi</button>
            </div>
          </form>
        </div>
      </div>
  </div>