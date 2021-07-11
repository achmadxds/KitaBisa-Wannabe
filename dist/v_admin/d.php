<?php
if (isset($_GET['kode'])) {
  $sql_cek = "SELECT * FROM mst_jenis WHERE id='" . $_GET['kode'] . "'";
  $query_cek = mysqli_query($con, $sql_cek);
  $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
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
      <a data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary btn-sm">Tambah Jenis</a>
  </div>
  <br>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          Master Jenis
        </div>
        <div class="card-body">
          <table class="table table-striped" id="table1">
            <thead>
              <center>
                <tr>
                  <th>No</th>
                  <th>Jenis</th>
                  <th></th>
                </tr>
              </center>
            </thead>
            <tbody>

              <?php
              $sql_tampil = "SELECT * FROM mst_jenis";
              $query_tampil = mysqli_query($con, $sql_tampil);
              $no = 1;
              while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
              ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td>
                    <a href="?page=jnsUbah&kode=<?php echo $data['id']; ?>" class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
                    <a href="?page=jnsAksi&kode=<?php echo $data['id']; ?>" onclick="return confirm('Hapus Jenis ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
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