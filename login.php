<?php
  include_once("koneksi.php");
  session_start();
  session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Donatur Donasi-Ku</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dist/v_admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="dist/v_admin/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="dist/v_admin/assets/css/app.css">
    <link rel="stylesheet" href="dist/v_admin/assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Silahkan login dengan akun donatur anda.</p>

                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group position-relative has-icon-left mb-4">
                        <i class="bi bi-person">
                        <input type="text" class="md-8"  name="txtusm" required autofocus>
                      </i>
                          
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                          <i class="bi bi-shield-lock">
                        <input type="password" class="md-8" name="txtpassword" required>
                        </i>
                           
                        </div>
                        
                        <button type="submit" name="btnLogin" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Belum Registrasi <a href="register.php"
                                class="font-bold">Sign
                                up</a>.</p>
                                <button class="btn btn-warning btn-sm">
      <a href="loginAdmin.php" class="text-center">Login Admin</a>
      </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>
<?php
  if (isset($_POST['btnLogin'])) {
    $sql_login = "SELECT * FROM donatur WHERE status='Aktif' AND username='" . $_POST['txtusm'] . "' AND password='" . $_POST['txtpassword'] . "'";
    $query_login = mysqli_query($con, $sql_login);
    $data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
    $jumlah_login = mysqli_num_rows($query_login);

    if ($jumlah_login >= 1) {
      session_start();
      $_SESSION["ses_username"] = $data_login["username"];
      $_SESSION["ses_nama"] = $data_login["nama"];
      $_SESSION["ses_id"] = $data_login["id"];
      // $_SESSION["ses_level"]=$data_login["level"];

      echo "<script>alert('Login Berhasil')</script>";
      echo "<meta http-equiv='refresh' content='0; url=dist/v_user/index.php'>";
    }
  }
  ?>