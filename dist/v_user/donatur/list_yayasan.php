<?php include_once("../../koneksi.php"); ?>

<div id="main">
  <header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
      <i class="bi bi-justify fs-3"></i>
    </a>
  </header>

  <div class="page-heading">
    <h3>List Yayasan</h3>
  </div>
  <div class="page-content">
    <section class="row">
      <div class="card">
        <div class="card-body">
          <table class="table table-striped" id="program2">
            <thead>
              <center>
                <tr>
                  <th>Nama Lembaga</th>
                  <th>Nama Ketua Lembaga</th>
                  <th>Aksi</th>
                </tr>
              </center>
            </thead>
            <tbody>
              <?php
                $a = SelectAllLembaga();

                foreach ($a as $key => $value) {
                  ?>
                    <tr>
                      <td><b><?php echo $value['nmLembaga'] ?></b></td>
                      <td><b><?php echo $value['nmPimpinan'] ?></b></td>
                      <td><a href="" class="btn btn-primary">LIHAT</a></td>
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
  $('#program2').DataTable({
    scrollY: 350,
    "columns": [
      { "width": "45%" },
      { "width": "45%" },
      { "width": "10%" }
    ]
  });
</script>