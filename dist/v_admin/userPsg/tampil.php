<?php 
     include_once("../../koneksi.php");
    ?>
<!-- <h4><span class="glyphicon glyphicon-briefcase"></span>Yayasan SMK NU Ma'arif Kudus</h4> -->


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
					Kelola User Perseorangan
				</div>
				<div class="card-body">
					<table class="table table-striped" id="table1">
          <thead>
          <center>
      <tr>
        <th>No</th>
        <th>Nama Perseorangan</th>
        <th>Username</th>
        <th>Status</th>
        <th></th>
    </tr>
    </center>
    </thead>
    <tbody>
    
    <?php
            $a = showUserPer();
            $no = 1;
            foreach ($a as $key => $data) {
        ?>
        <tr>       
            <td><?php echo $no; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['username']; ?></td>
            <td><?php echo $data['status']; ?></td>
          
            <td>
            <?php
               if($data['status'] == 'Aktif'){
              ?>
                <a href="?page=usrPrgUbah&kode=<?php echo $data['id']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
              <?php
              } else {
                ?>
                <a href="?page=konfirmed&kode=<?php echo $data['id']; ?>"onclick="return confirm('Aktifkan User ini ?')" class='btn btn-success btn-sm'><i class="fa fa-check"></i></a>
                <a href="?page=usrPrgUbah&kode=<?php echo $data['id']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
                <?php
              }
              ?>
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
