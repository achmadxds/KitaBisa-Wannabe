<?php
include_once("koneksi.php");
// KODE OTOMATIS
// membuat query max untuk kode
$carikode = mysqli_query($con, "SELECT MAX(kdProgram) FROM program") or die('error');
// menjadikannya array
$datakode = mysqli_fetch_array($carikode);
// jika $datakode
if ($datakode) {
  // var_dump($datakode);
  // membuat variabel baru untuk mengambil kode mulai dari 3
  $nilaikode = $datakode[0];
  // menjadikan $nilaikode ( int )
  $kode = (int) filter_var($nilaikode, FILTER_SANITIZE_NUMBER_INT);
  // setiap $kode di tambah 1
  $kodes = $kode + 1;

  $hasilkode = "PLDN" . str_pad($kodes, 2, "0", STR_PAD_LEFT);
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

  <div class="page-heading">
    <h3>Kelola Data Program</h3>
  </div>

  <div class="page-content">
    <section class>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <?php
                        if ($data_status == 'L-pimpinan') {
                        ?>
                         
                        <?php
                        } elseif ($data_status == 'L-admin') {
                        ?>
                          <a data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary btn-sm">Ajukan Program</a>
                        <?php
                        } else {
                        ?>
                        <?php
                        } ?>
              
              <!-- Program Terdaftar -->
            </div>
            <div class="card-body">
              <table class="table table-striped" id="program5">
                <thead>
                  <center>
                    <tr>
                      <th>No</th>
                      <th>Kode Program</th>
                      <th>Nama Program</th>
                      <th>Lembaga</th>
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

                  $sql_tampil = "SELECT a.id, a.kdProgram, a.nmProgram, b.nmLembaga, a.keterangan, a.donasi, a.status FROM program a, lembaga b WHERE a.idLembaga=b.id AND (a.status='T' or a.status='P' or a.status='A') AND a.idLembaga='$data_id' AND a.idLevel='1'";
                  $query_tampil = mysqli_query($con, $sql_tampil);
                  $no = 1;
                  while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
                  ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['kdProgram']; ?> <br>

                      </td>
                      <td><?php echo $data['nmProgram']; ?></td>
                      <td><?php echo $data['nmLembaga']; ?></td>
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
                    <?php
                        if ($data_status == 'L-pimpinan') {
                        ?>
                          <a href="?page=progDet&kode=<?php echo $data['id']; ?>" class='btn btn-success btn-sm'><i class="fa fa-eye"></i></a>
                        <?php
                        } elseif ($data_status == 'L-admin') {
                        ?>
                        <a href="?page=progDet&kode=<?php echo $data['id']; ?>" class='btn btn-success btn-sm'><i class="fa fa-eye"></i></a>
                        <a href="?page=progAksi&kode=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
                        <?php
                        } else {
                        ?>
                        <?php
                        } ?>
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
    </section>
  </div>
</div>

<div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <form action="?page=progAksi" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Program</h4>
        </div>
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

            <input type="hidden" class="form-control" name="txtidPengguna" value="<?php echo $data_id ?>" />
          
          <div class="form-group">
            <label>Jenis Program</label>
            <select name="txtJenis" class="form-control">
              <option value="">- Program -</option>
              <?php
              $p = mysqli_query($con, "select id, nama from mst_jenis") or die(mysqli_error($con));
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
            <input type="date" class="form-control" name="txtAkhirtgl" />
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="btnSimpan">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
  $('#program5').DataTable({
    scrollY: 350,
    "columns": [{
        "width": "5%"
      },
      {
        "width": "20%"
      },
      {
        "width": "30%"
      },
      {
        "width": "10%"
      },
      {
        "width": "10%"
      },
      {
        "width": "10%"
      },
      {
        "width": "15%"
      },
    ]
  });
</script>