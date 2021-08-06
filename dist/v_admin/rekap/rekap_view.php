<?php
  include_once("__DIR__ .  ../../../../koneksi.php");

  switch ($_GET['level']) {
    case 'lembaga':
      switch ($_GET['tipe']) {
        case 'program':
          $a = $_GET['idUser'];
          $query = "SELECT * FROM program where idLembaga='$data_id' AND `status`='P' ";
          break;

        default:
        echo '<script> alert("AK") </script>';
        break;
        }
        
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
  <a href="rekap/cetak_program.php?tj=program&aidi=<?php echo $_SESSION['ses_id'] ?>" class="btn btn-primary "target="_blank"><i class="fa fa-fw fa-print"></i> Print</a>
  <br><br>
    <section class>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              Program Terdaftar
            </div>
            
            <div class="card-body">
              <table class="table table-striped" id="program212">
                <thead>
                  <center>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Nama Program</th>
                      <th>Tanggal Pengajuan</th>
                      <th>Aksi</th>
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
                          <td><?php echo date("d-m-Y", strtotime($value['tgl_masuk'])); ?></td>
                          <td><a href="?page=rekapDonasi&idKode=<?php echo $value['id'] ?>" class="btn btn-primary btn-sm">Detail Donasi</a></td>
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
      { "width": "15%" },
      { "width": "40%" },
      { "width": "20%" },
      { "width": "15%" }
    ]
  });
</script>