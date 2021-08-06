<?php
  include_once("__DIR__ .  ../../../../koneksi.php");

  if(!$_GET['idKode']) {
    echo "<meta http-equiv='refresh' content='0; url=?level=perseorangan&page=rekapProgram&tipe=program&idUser= '".$_SESSION["ses_id"]."' '>";
  } else {
    $a = $_GET['idKode'];
    $query = "SELECT b.*, a.nominal, a.tanggal FROM transaksi a, donatur b where a.idProgram=$a AND a.idDonatur=b.id AND a.status='K' ";
    $sql = mysqli_query($con, $query);
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
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="perseorangan/rekap/rekap_download.php?tj=donasi&aidi=<?php echo $_GET['idKode'] ?>" class="btn btn-primary btn-sm">Download</a>
            </div>
            <div class="card-body">
              <table class="table table-striped" id="program212">
                <thead>
                  <center>
                    <tr>
                      <th>No</th>
                      <th>Nama Danatur</th>
                      <th>Nominal</th>
                      <th>Nomor HP</th>
                      <th>Tanggal</th>
                    </tr>
                  </center>
                </thead>

                <tbody>
                  <?php
                    $no = 1;
                    foreach ($sql as $value) {
                      ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $value['nama']; ?></td>
                          <td><?php echo $value['nominal']; ?></td>
                          <td><?php echo $value['no_hp'] ?></td>
                          <td><?php echo $value['tanggal'] ?></td>
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

<script>
  console.log($('#program90'))
  $('#program212').DataTable({
    scrollY: 350,
    "columns": [
      { "width": "10%" },
      { "width": "35%" },
      { "width": "20%" },
      { "width": "20%" },
      { "width": "15%" }
    ]
  });
</script>