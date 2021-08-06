<?php include_once("../../koneksi.php"); ?>

<div id="main">
  <header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
      <i class="bi bi-justify fs-3"></i>
    </a>
  </header>

  <div class="page-heading">
    <h3>Riwayat Donasi</h3>
  </div>
  <div class="page-content">
    <section class="row">
      <div class="card">
        <div class="card-body">
          <table class="table table-striped" id="program3">
            <thead>
              <center>
                <tr>
                  <th>Nama Program</th>
                  <th>Nominal Donasi</th>
                  <th>Lembaga</th>
                  <th>Status</th>
                  <th>Tanggal</th>
                  
                </tr>
              </center>
            </thead>
            <tbody>
              <?php
                $a = RecordTransaction($idPengguna);
                foreach ($a as $key => $value) {
                  ?>
                    <tr>
                      <td><b><?php echo $value['nmProgram'] ?></b></td>
                      <td><b><?php echo $value['nominal'] ?></b></td>
                      <?php
                        if($value['idLevel'] == 1) {
                          echo "<td><b> Lembaga </b></td>";
                        } else {
                          echo "<td><b> Perseorangan </b></td>";
                        }
                      ?>
                      <?php
                        if($value['status'] == 'T') {
                          echo "<td><b> Tangguhkan </b></td>";
                        } else {
                          echo "<td><b> Terkonfirmasi </b></td>";
                        }
                      ?>
                      <td><b><?php echo date("d-m-Y", strtotime($value['tanggal'])) ?></b></td>
                      
                    </tr>
                  <?php
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>
</div>

<script>
  $('#program3').DataTable({
    scrollY: 350,
    "columns": [
      { "width": "30%" },
      { "width": "15%" },
      { "width": "25%" },
      { "width": "20%" },
      { "width": "10%" }
    ]
  });
</script>