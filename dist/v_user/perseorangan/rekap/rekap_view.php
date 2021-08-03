<?php
  include_once("__DIR__ .  ../../../../koneksi.php");

  switch ($_GET['level']) {
    case 'perseorangan':
      switch ($_GET['tipe']) {
        case 'program':
          $a = $_GET['idUser'];
          $query = "SELECT * FROM program a, perseorangan b, transaksi c WHERE a.idLembaga=$a AND c.idProgram=a.id AND a.status='A' ";
          break;
          
          case 'donasi':
            $a = $_GET['idUser'];
            break;
          }
          break;
        }
        
        $sql = mysqli_query($con, $query);
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
                      <th>Kode</th>
                      <th>Nama Program</th>
                      <th>Tanggal Pengajuan</th>
                      <th></th>
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
                          <td><?php echo $value['kdProgram']; ?></td>
                          <td><?php echo $value['nmProgram']; ?></td>
                          <td><?php echo date("d-M-Y", strtotime($value['tgl_masuk'])); ?></td>
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