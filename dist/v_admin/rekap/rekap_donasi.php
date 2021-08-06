<?php
  include_once("__DIR__ .  ../../../../koneksi.php");

  if(!$_GET['idKode']) {
    echo '<script> alert("id Kosong") </script>';
  } else {
    $a = $_GET['idKode'];
    $query = "SELECT b.*, a.nominal, a.tanggal FROM transaksi a, donatur b where a.idProgram=$a AND a.idDonatur=b.id";
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
  <?php

  ?>
  <a href="rekap/cetak_program.php?tj=donasi&aidi=<?php echo $_GET['idKode'] ?>" class="btn btn-primary "target="_blank"><i class="fa fa-fw fa-print"></i> Print</a>
  <br><br>
    <section class>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              Donatur dari Program
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