<?php
error_reporting(0);
include_once("../../koneksi.php");
?>

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-content">
        <section class>

            <body style=color:black;>
                <hr>

                <center>
                    <b>
                        <h4 style="font-family: Trebuchet MS;">Laporan Data Open Donasi</h4>
                    </b>
                </center>
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table border="1" style="width: 100%" id="ack" class="table table-border">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Program</th>
                                            <th>Program</th>
                                            <th>Dana Target</th>
                                            <th>Dana Terkumpul</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql_tampil = "SELECT a.id, b.id as boom, a.nominal, a.status, b.kdProgram, b.nmProgram, b.donasi, b.idLembaga FROM transaksi a, program b WHERE a.idProgram=b.id AND b.idLembaga='$data_id' AND b.idlevel='1'";
                                        $query_tampil = mysqli_query($con, $sql_tampil);
                                        $no = 1;
                                        while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
                                        ?>
                                            <center>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $data['kdProgram']; ?></td>
                                                    <td><?php echo $data['nmProgram']; ?></td>
                                                    <td>Rp. <?php echo $data['donasi']; ?></td>
                                                    <td>Rp. <?php echo $data['nominal']; ?></td>

                                                </tr>
                                            </center>
                                        <?php
                                            $no++;
                                        }
                                        ?>

                                    </tbody>
                                </table>

                                <br>
                                <table border="0" cellspacing="0" cellpadding="0">
                                    <thead>

                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </center>
        </section>
    </div>
</div>
<script>
    window.print();

  console.log($('#program1'))
  $('#ack').DataTable({
      "paging" : false,
      "searching" : false
  });
</script>
