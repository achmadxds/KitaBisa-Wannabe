<?php
include_once("../koneksi.php");
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
                  $sql_otoarsip = "UPDATE program SET status='A' WHERE tgl_akhir=curdate()";
                  $query_oto = mysqli_query($con, $sql_otoarsip);

                  ?>

                  <?php
                  $sql_tampil = "SELECT a.id, a.kdProgram, b.nama,a.nmProgram, a.keterangan, a.donasi, a.status FROM program a, perseorangan b WHERE a.idLembaga=b.id  AND (a.status='T' or a.status='P') AND (a.idLembaga='$data_id' AND a.idLevel='2') ";
                  $query_tampil = mysqli_query($con, $sql_tampil);
                  $no = 1;
                  while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
                  ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['kdProgram']; ?> <br>

                      </td>
                      <td><?php echo $data['nmProgram']; ?></td>
                      <td><?php echo $data['nama']; ?></td>
                      <td><?php echo $data['donasi']; ?></td>
                      <td>
                        <?php
                        if ($data['status'] == 'P') {
                        ?>
                          Publish
                        <?php
                        } elseif ($data['status'] == 'A') {
                        ?>
                          Arsip
                        <?php
                        } else {
                        ?>
                          Ditangguhkan
                      </td>
                    <?php
                        } ?></td>

                    <td>
                      <a href="?page=progUbah&kode=<?php echo $data['id']; ?>" class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
                      <a href="?page=progDet&kode=<?php echo $data['id']; ?>" class='btn btn-success btn-sm'><i class="fa fa-eye"></i></a>
                      <a href="?page=progAksi&kode=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
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
            <label>Perseorangan</label>
            <select name="txtIdLembaga" class="form-control">
              <option value="">- Perseorangan -</option>

              <?php
              $p = mysqli_query($con, "select id , nama from perseorangan where id='$data_id'") or die(mysqli_error($con));
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
  console.log($('#program1'))
  $('#program1').DataTable({
    scrollY: 350,
  });
</script>