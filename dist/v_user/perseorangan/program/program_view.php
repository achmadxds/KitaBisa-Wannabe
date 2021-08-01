<?php
  include_once("__DIR__ .  ../../../../koneksi.php");
  $maxID = MaxIdProgram();
?>

<div id="main">
  <header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
      <i class="bi bi-justify fs-3"></i>
    </a>
  </header>

  <div class="page-content">
    <section class>
      <a data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary btn-sm">Ajukan Program</a>
      <br>
      <br>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              Program Terdaftar
            </div>
            <div class="card-body">
              <table class="table table-striped" id="program1">
                <thead>
                  <center>
                    <tr>
                      <th>No</th>
                      <th>Kode Program</th>
                      <th>Nama Program</th>
                      <th>Atas Nama</th>
                      <th>Donasi</th>
                      <th>Status</th>
                      <th></th>
                    </tr>
                  </center>
                </thead>

                <tbody>
                  <?php
                    $data = SelectDataProgram($_SESSION["ses_id"]);
                    $no = 1;
                    foreach ($data as $value) {
                      ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $value['kdProgram']; ?></td>
                          <td><?php echo $value['nmProgram']; ?></td>
                          <td><?php echo $value['nama']; ?></td>
                          <td><?php echo $value['donasi']; ?></td>
                          <td>
                            <?php
                              switch ($value['status']) {
                                case 'P':
                                  echo 'Publish';
                                  break;
                                
                                case 'A':
                                  echo 'Arsip';
                                  break;

                                default:
                                  echo 'Ditangguhkan';
                                  break;
                              }
                            ?>
                          </td>
                          <td>
                            <a href="?level=perseorangan&page=programEdit&kode=<?php echo $value['id']; ?>" class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
                            <a href="?level=perseorangan&page=programDetail&kode=<?php echo $value['id']; ?>" class='btn btn-success btn-sm'><i class="fa fa-eye"></i></a>
                            <a href="?level=perseorangan&page=programSave&kode=<?php echo $value['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
                          </td>
                        </tr>
                      <?php
                      $no++;
                    }
                  ?>
                </tbody>
              </table>
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
        <h4 class="modal-title">Tambah Program</h4>
      </div>
      <form action="?level=perseorangan&page=programSave" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label>Kode Program</label>
            <input type="text" class="form-control" name="txtKdProgram" value="<?php echo $maxID; ?>" readonly />
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
            <label>Perseorangan</label>
            <select name="txtIdLembaga" class="form-control">
              <option value="<?php echo $_SESSION["ses_id"] ?>"><?php echo $_SESSION["ses_nama"] ?></option>

              <?php
              $p = mysqli_query($con, "select * from mst_jenis") or die(mysqli_error($con));
              while ($datap = mysqli_fetch_array($p)) {
                echo '<option value="' . $datap['id'] . '">' . $datap['nama'] . '</option>';
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

          <div class="form-group">
            <label>Tanggal Akhir</label>
            <input type="date" class="form-control" name="txtAkhir" />
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

<script>
  $('#program1').DataTable({
    scrollY: 350,
    "columns": [
      { "width": "5%" },
      { "width": "15%" },
      { "width": "25%" },
      { "width": "15%" },
      { "width": "15%" },
      { "width": "10%" },
      { "width": "15%" },
    ]
  });
</script>