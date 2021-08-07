<?php
include_once("__DIR__ .  ../../../../koneksi.php");

if (isset($_GET['kode'])) {
  $data = DetailProgram($_GET['kode']);
}
?>

<div id="main">
  <header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
      <i class="bi bi-justify fs-3"></i>
    </a>
  </header>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h6>
            Detail <small><?php echo $data['nmProgram'] ?></small>
          </h6>
        </div>
        <div class="card-body">
          <div class="panel-body">

            <div class="tabs">
              <ul class="nav nav-tabs nav-justified">
                <li class="active">
                  <a href="#popular10" data-bs-toggle="tab" class="text-center"><i class="fa fa-tags"></i> Detail
                    Program</a>
                </li>
                <li>
                  <a href="#recent10" data-bs-toggle="tab" class="text-center"><i class="fa fa-envelope"></i> File
                    Gambar</a>
                </li>
              </ul>
            </div>
            <div class="tab-content">
              <div id="popular10" class="tab-pane active">

                <section class="panel">
                  <div class="panel-body">
                    <table class="table">
                      <tbody>

                        <tr class="gradeX">
                          <td width="170"><b>ID Program</b></td>
                          <td><?php echo $data['kdProgram']; ?></td>

                        </tr>
                        <tr class="gradeX">
                          <td width="170"><b>Nama Program</b></td>
                          <td><?php echo $data['nmProgram']; ?></td>
                        </tr>

                        <tr class="gradeX">
                          <td width="170"><b>Lembaga / Perseorangan</b></td>
                          <td>
                            <?php if ($data['idLevel'] == '1') { ?>
                              Lembaga -
                            <?php
                            } else {
                            ?>
                              Perseorangan -
                            <?php
                            }
                            ?>
                            <?php echo $data['kdPerseorangan']; ?>
                          </td>
                        </tr>

                        <tr class="gradeX">
                          <td width="170"><b>Keterangan</b></td>
                          <td><?php echo $data['keterangan']; ?></td>
                        </tr>

                        <tr class="gradeX">
                          <td width="170"><b>Donasi</b></td>
                          <td><?php echo $data['donasi']; ?></td>
                        </tr>

                        <tr class="gradeX">
                          <td width="170"><b>Status Program</b></td>
                          <td>
                            <?php if ($data['status'] == 'T') { ?>
                              Ditangguhkan
                            <?php
                            } elseif ($data['status'] == 'P') { ?>
                              Publish
                            <?php
                            } else {
                            ?>
                              Arsip
                            <?php
                            }
                            ?>
                          </td>
                        </tr>

                      </tbody>
                    </table>
                </section>
              </div>
              </form>

              <div id="recent10" class="tab-pane">
                <section class="panel">
                  <?php
                  if ($data['gambar'] != null) {
                  ?>
                    <embed src="/upload/surat/. $kode->fileSurat ?>" type="application/pdf" width="100%" height="600px">
                  <?php
                  } else {
                  ?>
                    <div class="text-center">
                      <br>
                      <h4>File Tidak Tersedia!</h4>
                    </div>
                  <?php
                  }
                  ?>
                </section>
              </div>
              </form>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>