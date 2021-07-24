<?php
  include_once("koneksi.php");
  if (isset($_POST['btnLogin'])) LoginUser();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal Donasi-Ku</title>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="dist/assets/css/bootstrap.css">

  <link rel="stylesheet" href="dist/assets/vendors/iconly/bold.css">

  <link rel="stylesheet" href="dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
  <link rel="stylesheet" href="dist/assets/vendors/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="dist/assets/css/app.css">
  <link rel="shortcut icon" href="dist/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
	<div id="app">
		<div id="main">

			<div class="page-content">
				<section class="content">
					<div class="row">
            <div class="col-8 mt-2">
              <div class="card m-5">

                <div class="card-body">
                  <center>
                    <font face="Tahoma"><b>SELAMAT DATANG DI PORTAL DONASI-KU</b></font><br>
                    <br><img src="dist/assets/images/logo/logo-umk.png" height="115px" width="340px" align="center">
										<br><br>
                    <form action="" method="post">
                      <div class="form-group col-sm-7">
                        <input type="text" class="form-control" name="txtusm" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                      </div>
                      <div class="form-group col-sm-7">
                        <input type="password" class="form-control" name="txtpassword" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                      </div>
                      <div class="form-group col-sm-5">
                        <button class="form-control btn btn-primary" name="btnLogin">Login</button>
                      </div>
                    </form>
                  </center><br>
                </div>
              </div>
            </div>
					</div>

			</div>

			</section>
		</div>

	</div>
	</div>

</body>

</html>