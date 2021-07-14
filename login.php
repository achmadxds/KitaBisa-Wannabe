<?php
  include_once("koneksi.php");
  // session_start();

  if (isset($_POST['btnLogin'])) {
    $sql_login = "SELECT * FROM donatur WHERE status='Aktif' AND username='" . $_POST['txtusm'] . "' AND password='" . $_POST['txtpassword'] . "'";
    $query_login = mysqli_query($con, $sql_login);
    $data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
    $jumlah_login = mysqli_num_rows($query_login);

    if ($jumlah_login >= 1) {
      session_start();
      $_SESSION["ses_username"] = $data_login["username"];
      $_SESSION["ses_nama"] = $data_login["nama"];
      // $_SESSION["ses_level"]=$data_login["level"];

      echo "<script>alert('Login Berhasil')</script>";
      echo "<meta http-equiv='refresh' content='0; url=v_user/index.php'>";
    }
  }

  // session_destroy();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Donatur| Portal Donasi-Ku</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="css/styles.css">
  <!-- Font Awesome -->
  

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
  <div class="login-box" style="text-align:center">
    <div class="login-logo">
      <img src="images/donasi.jpg" height="100px" width="100px;" />
      <a href="login2.php"><b>Donasi-Ku</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body" style="text-align: center;">
      <p class="login-box-msg">Login untuk memulai</p>

      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group has-feedback">
          <input type="text" class="md-8" placeholder="Username" name="txtusm" required autofocus>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="md-8" placeholder="Password" name="txtpassword" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-5">
            <div class="checkbox icheck">
              <label>

              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-3">
            <button class="btn btn-warning btn-sm">
              <a href="index.php" class="warning">Kembali
            </button>
            <button type="submit" class="btn btn-primary btn-block btn-flat btn-sm" name="btnLogin">Sign In</button>
          </div>
          
          <!-- /.col -->
        </div>
      </form>
      <br><br>
      <button class="btn btn-warning btn-sm">
      <a href="loginAdmin.php" class="text-center">Login Admin</a>
      </button>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 3 -->
  
</body>

</html>