<?php
  define('HOST','localhost');
  define('USER','root');
  define('PASS','');
  define('DB','sosial');

  $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');

  function LoginUser() {
    global $con;

    $sql_login = "SELECT * FROM `user` WHERE status='Aktif' AND `username`='" . $_POST['txtusm'] . "' AND `password`='" . $_POST['txtpassword'] . "'";
    $query_login = mysqli_query($con, $sql_login);
    $data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
    $jumlah_login = mysqli_num_rows($query_login);

    if ($jumlah_login >= 1) {
      session_start();
      $_SESSION["ses_username"] = $data_login["username"];
      $_SESSION["ses_nama"] = $data_login["nama"];
      $_SESSION["ses_level"] = $data_login["level"];
      $_SESSION["ses_id"] = $data_login['idDaftar'];

      echo "<script>alert('Login Berhasil')</script>";
      switch ($data_login['level']) {
        case 'admin':
          echo "<meta http-equiv='refresh' content='0; url=dist/v_admin/index.php'>";
          break;
        
        case 'perseorangan':
          echo "<meta http-equiv='refresh' content='0; url=dist/v_perseorangan/index.php'>";
          break;

        case 'L-kasie':
          echo "<meta http-equiv='refresh' content='0; url=dist/v_admin/index.php'>";
          break;

        case 'L-seksie':
          echo "<meta http-equiv='refresh' content='0; url=dist/v_admin/index.php'>";
          break;


        case 'donatur':
          echo "<meta http-equiv='refresh' content='0; url=dist/v_user/index.php'>";
          break;
      }
    } else {
      echo "<script>alert('Login Gagal!!')</script>";
    }
  }

  function SelectAllLembaga()
  {
    global $con;

    $sql = "SELECT * FROM `lembaga` ";
    $query_login = mysqli_query($con, $sql);

    return $query_login;
  }

  function SelectAllProgram()
  {
    global $con;

    $sql = "SELECT * FROM `program` WHERE status='P' ";
    $query_login = mysqli_query($con, $sql);

    return $query_login;
  }

  function InserTransaksi()
  {
    global $con;

    $sql = "INSERT INTO `transaksi`(`idProgram`, `idDonatur`, `nominal`, `status`, `tanggal`) VALUES 
    ('".$_POST['idProgramDonasi']."','".$_POST['idDonaturDonasi']."','".$_POST['dnProgramDonasi']."','T', now())";
    
    mysqli_query($con, $sql);
  }

  function RecordTransaction()
  {
    global $con;

    $idUser = $_SESSION["ses_id"];
    $sql = 'SELECT a.nominal, b.nmProgram, a.tanggal FROM transaksi a, program b WHERE b.id = a.idProgram AND a.idDonatur='.$idUser.' ';

    $query = mysqli_query($con, $sql);

    return $query;
  }

  function insertKelolaDana()
  {
    global $con;

    // $sql = 'INSERT INTO `dana`(`idProgram`, `jumlah`, `status`) VALUES ('.$_POST['txtIdLembaga'].','.$_POST['txtIdLembaga'].','[value-4]') ';
  }
?>