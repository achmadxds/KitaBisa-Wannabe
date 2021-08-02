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
                      <td><a href="#" class="btn btn-primary" onclick="duh(this)" data-id="<?php echo $value['nmLembaga'] . '~' .$value['alamat'] . '~' .$value['no_rek'] . '~' .$value['nmPimpinan'] . '~' .$value['no_hp'] . '~' .$value['tgl'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">LIHAT</a></td>
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h3 class="text-center">Detail Yayasan</h3>
        <hr>
        <div class="row pb-2">
          <div class="col-6">
            <label for=""><b>Nama Lembaga</b></label>
            <input type="text" class="form-control" id="namaL" readonly />
            <br>
            <label for=""><b>Alamat Lembaga</b></label>
            <textarea style="resize: none;" id="alamatL" cols="30" rows="2" class="form-control" readonly></textarea>
            <br>
            <label for=""><b>Nomor Rekening</b></label>
            <input type="text" class="form-control" id="rekL" readonly />
          </div>
          <div class="col-6">
            <label for=""><b>Nama Pimpinan</b></label>
            <input type="text" class="form-control" id="pimpL" readonly />
            <br>
            <label for=""><b>Nomor Telepon</b></label>
            <textarea style="resize: none;" id="telpL" cols="30" rows="2" class="form-control" readonly></textarea>
            <br>
            <label for=""><b>Tanggal</b></label>
            <input type="text" class="form-control" id="tglL" readonly />
          </div>
        </div>
      </div>
    </div>
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

  function duh(param) {
    let A = $(param).data('id')
    const data = A.split('~')

    $('#namaL').val(data[0])
    $('#alamatL').val(data[1])
    $('#rekL').val(data[2])
    $('#pimpL').val(data[3])
    $('#telpL').val(data[4])
    $('#tglL').val(data[5])
  }
</script>