<?php include_once("__DIR__ .  ../../../../koneksi.php"); ?>

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
              Kelola Dana
            </div>
            <div class="card-body">
              <table class="table table-striped" id="table111">
                <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Program</th>
                      <th>Nama Program</th>
                      <th>Dana Target</th>
                      <th>Dana Masuk</th>
                      <th>Dana Tidak Tercapai</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    $data = SelectDataDana($_SESSION["ses_id"]);
                    foreach ($data as $value) {
                      ?>
                        <tr>
                          <td></td>
                          <td><?php echo $value['kdProgram']; ?></td>
                          <td><?php echo $value['nmProgram']; ?></td>
                          <td><?php echo $value['donasi']; ?></td>
                          <td><?php echo $value['Total']; ?></td>
                          <td><?php echo $value['Tidak']; ?></td>
                        </tr>
                      <?php
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
  $('#table111').DataTable({})
</script>