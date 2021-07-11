<?php
include_once("koneksi.php");
?>
<div id="main">
	<header class="mb-3">
		<a href="#" class="burger-btn d-block d-xl-none">
			<i class="bi bi-justify fs-3"></i>
		</a>
	</header>

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					Donasi Perseorangan
				</div>
				<div class="card-body">
					<table class="table table-striped" id="table1">
					<thead>
    <center>
      <tr>
        <th>No</th>
        <th>ID</th>
        <th>Nama</th>
        <th>Jekel</th>
        <th>Alamat</th>
        <th>No Hp</th>
        <th>Rekening</th>
        <th></th>
    </tr>
    </center>
    </thead>
    <tbody>
    
        <?php
            $sql_tampil = "SELECT * FROM perseorangan";
            $query_tampil = mysqli_query($con, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
        <tr>       
            <td><?php echo $no; ?></td>
            <td><?php echo $data['kdPerseorangan']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td>
                <?php
                if ($data['jekel']== 'P'){
                ?>
                Perempuan
                <?php 
                }else{
                ?>
                Laki-Laki
                </td>
                <?php 
                }?>
            <td><?php echo $data['alamat']; ?></td>
            <td><?php echo $data['no_hp']; ?></td>
            <td><?php echo $data['no_rek']; ?></td>

            <td>
                    <a href="?page=prsgUbah&kode=<?php echo $data['id']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
                    <a href="?page=prsgDet&kode=<?php echo $data['id']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-eye"></i></a>
                    <a href="?page=prsgAksi&kode=<?php echo $data['id']; ?>"onclick="return confirm('Hapus Perseorangan ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
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



