<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'sosialrev');
// define('DB','sosial');

$con = mysqli_connect(HOST, USER, PASS, DB) or die('Unable to Connect');

function LoginUser()
{
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
        echo "<meta http-equiv='refresh' content='0; url=dist/v_user/index.php'>";
        break;

      case 'L-pimpinan':
        echo "<meta http-equiv='refresh' content='0; url=dist/v_admin/index.php'>";
        break;

      case 'L-admin':
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

function GetMasterJenis()
{
  global $con;
  $sql = "SELECT * FROM `mst_jenis`";
  $query = mysqli_query($con, $sql);

  return $query;
}

function SelectAlljenis()
{
  global $con;
  $sql = "SELECT * FROM `mst_jenis` ";
  $query_login = mysqli_query($con, $sql);

  return $query_login;
}

function SelectAllDonatur()
{
  global $con;
  $sql = "SELECT * FROM `donatur` ";
  $query_login = mysqli_query($con, $sql);
  return $query_login;
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
    ('" . $_POST['idProgramDonasi'] . "','" . $_POST['idDonaturDonasi'] . "','" . $_POST['dnProgramDonasi'] . "','T', now())";
  $query_insert = mysqli_query($con,$sql) or die (mysqli_connect_error());
		
  if($query_insert) {
    echo "<script>alert('Simpan Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php?level=donatur&page=prog&an=1'>";

  }else{
  echo "<script>alert('Simpan Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php?level=donatur&page=prog&an=1'>";
  }
}

function UpdateJumlahDonasi()
{
  global $con;
  // UPDATE `program` SET `jumlah`='[value-9]' WHERE `id`=1
  $sql = "SELECT * FROM `program` WHERE `id`";
}

function RecordTransaction()
{
  global $con;

  $idUser = $_SESSION["ses_id"];
  $k = "K";
  $sql ='SELECT a.*, c.nmProgram, c.idLevel, c.idLembaga FROM transaksi a, donatur b, program c WHERE a.idDonatur=b.id AND a.idProgram=c.id  AND a.idDonatur=' . $idUser . ' AND (c.idLembaga IN (SELECT id FROM lembaga) OR (SELECT id FROM perseorangan))';

  $query = mysqli_query($con, $sql);

  return $query;
}


function insertKelolaDana($a, $b)
{
  global $con;
  $c = 1;
  $sql = 'INSERT INTO `dana`(`idProgram`, `jumlah`, `status`) 
            VALUES (' . $a . ',' . $b . ', ' . $c . ') ';

  mysqli_query($con, $sql) or die();
}

function ShowProgramPublish()
{
  global $con;

  // $sql = 'SELECT * FROM `program` WHERE `status` = "P" ';
  $sql ='SELECT a.* , SUM(b.nominal) AS jumlah FROM program a, transaksi b WHERE b.idProgram=a.id AND a.`status` = "P" OR (b.nominal IS NULL)';
  $query = mysqli_query($con, $sql);

  return $query;
}

function MaxIdProgram()
{
  global $con;

  $carikode = mysqli_query($con, "SELECT MAX(kdProgram) FROM program");
  $datakode = mysqli_fetch_array($carikode);
  if ($datakode) {
    // $nilaikode = substr($datakode[0], 3);
    $nilaikode = substr($datakode[0],4);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;

    $hasilkode = "PLDN" . str_pad($kode, 2, "0", STR_PAD_LEFT);
  } else {
    $hasilkode = "PLDN01";
  }

  return $hasilkode;
}

function SelectAllProg()
{
  global $con;

  $sql = "SELECT * FROM `program` ";
  $query_login = mysqli_query($con, $sql);

  return $query_login;
}

function SelectAllPerseorangan()
{
  global $con;

  $sql = "SELECT a.id, a.kdPerseorangan, a.nama, a.jekel, a.alamat, a.berkas, a.no_hp, a.no_rek, a.tgl_daftar, b.status FROM perseorangan a, user b WHERE b.idDaftar=a.id AND  b.level='perseorangan'";
  $query_login = mysqli_query($con, $sql);

  return $query_login;
}

function showUserSuper()
{
  global $con;

  $sql = "SELECT a.id, a.nama, a.username, a.idDaftar, b.nmLembaga, a.level, a.status FROM user a, lembaga b WHERE a.idDaftar=b.id AND (a.level != 'donatur' AND a.level != 'perseorangan') OR a.idDaftar ='0'";
  $query_login = mysqli_query($con, $sql);

  return $query_login;
}

function showUserPer()
{
  global $con;

  $sql = "SELECT a.id, a.nama, a.username, a.status FROM user a, perseorangan b WHERE a.idDaftar=b.id AND level='perseorangan'";
  $query_login = mysqli_query($con, $sql);

  return $query_login;
}

function showUserDon()
{
  global $con;

  $sql = "SELECT * FROM user WHERE level ='donatur'";
  $query_login = mysqli_query($con, $sql);

  return $query_login;
}

function confirmUser()
{
  global $con;
  if (isset($_GET['kode'])) {
    $sql_arsip = "UPDATE user SET status = 'Aktif' where id = '" . $_GET['kode'] . "'";
    $query_arsip = mysqli_query($con, $sql_arsip);

    if ($query_arsip) {
      echo "<script>alert('Akun Diaktifkan')</script>";
      echo "<meta http-equiv='refresh' content='0; url=?page=user'>";
    } else {
      echo "<script>alert('Akun Gagal Diaktifkan')</script>";
      echo "<meta http-equiv='refresh' content='0; url=?page=user'>";
    }
  }
}

function SelectDataProgram($data_id)
{
  global $con;

  $query = "SELECT a.id, a.kdProgram, b.nama,a.nmProgram, a.keterangan, a.donasi, a.status FROM program a, perseorangan b WHERE a.idLembaga=b.id  AND (a.status='T' or a.status='P' or a.status='A') AND (a.idLembaga='$data_id' AND a.idLevel='2') ";
  $sql = mysqli_query($con, $query);

  return $sql;
}



function GetDataProgramByID($id)
{
  global $con;

  // $query    = "SELECT * FROM program WHERE id='$id'";
  $query    = "SELECT a.*, SUM(b.nominal) AS jumlah FROM program a, transaksi b WHERE b.idProgram=a.id AND a.`status` = 'P' AND a.id='$id'";
  // SELECT a.*, SUM(b.nominal) AS jumlah FROM program a, transaksi b WHERE b.idProgram=a.id AND a.`status` = "P" AND a.id='27'
  $sql      = mysqli_query($con, $query);
  $sql_slice = mysqli_fetch_array($sql, MYSQLI_BOTH);

  return $sql_slice;
}

function Upload_Files($namePost, $codePost, $jenist)
{
  $ekstensi_diperbolehkan  = array('jpg', 'png', 'jpeg');
  $nama = $_FILES[$namePost]['name'];
  $x = explode('.', $nama);
  $ekstensi = strtolower(end($x));
  $namas = 'Photo_' . $_POST[$codePost] . '_' . $jenist . "." . $ekstensi;
  $ukuran  = $_FILES[$namePost]['size'];
  $file_tmp = $_FILES[$namePost]['tmp_name'];

  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    if ($ukuran < 41943040) {
      move_uploaded_file($file_tmp, __DIR__ . '/images/files/' . $namas);
      return $namas;
    } else {
      return;
    }
  } else {
    return;
  }
}

function InsertToProgram($upload)
{
  global $con;

  $date = date('Y-m-d');
  $sql_insert = "INSERT INTO program (kdProgram, nmProgram, idLembaga, keterangan, donasi, status, idLevel, gambar, tgl_masuk, tgl_akhir, idJenis) VALUES (
					'" . $_POST['txtKdProgram'] . "',
					'" . $_POST['txtNmProgram'] . "',
					'" . $_POST['txtIdLembaga'] . "',
					'" . $_POST['txtketerangan'] . "',
          '" . $_POST['txtDonasi'] . "',
					'T',
          '2',
					'" . $upload . "',
					'" . $date . "',
					'" . $_POST['txtAkhir'] . "',
          '" . $_POST['txtJenis'] . "')";

  $query_insert = mysqli_query($con, $sql_insert) or die(mysqli_connect_error());

  if ($query_insert) {
    echo "<script>alert('Simpan Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php?level=perseorangan&page=program'>";
  } else {
    echo "<script>alert('Simpan Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php?level=perseorangan&page=program'>";
  }
}

function UpdateToProgram()
{
  global $con;

  $sql_ubah = "UPDATE program SET
        kdProgram='" . $_POST['txtKdProgram'] . "',
        nmProgram='" . $_POST['txtNmProgram'] . "',
        idLembaga='" . $_POST['txtIdLembaga'] . "',
        keterangan='" . $_POST['txtKeterangan'] . "',
        donasi='" . $_POST['txtDonasi'] . "',
        status='T'
        WHERE id='" . $_POST['txtId'] . "'";
  $query_ubah = mysqli_query($con, $sql_ubah);

  if ($query_ubah) {
    echo "<script>alert('Ubah Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php?level=perseorangan&page=program'>";
  } else {
    echo "<script>alert('Ubah Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php?level=perseorangan&page=program'>";
  }
}

function DeleteProgram($id)
{
  global $con;

  $sql_hapus = "DELETE FROM program WHERE id='$id' ";
  $query_hapus = mysqli_query($con, $sql_hapus);

  if ($query_hapus) {
    echo "<script>alert('Hapus Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php?level=perseorangan&page=program'>";
  } else {
    echo "<script>alert('Hapus Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php?level=perseorangan&page=program'>";
  }
}

function DetailProgram($id)
{
  global $con;

  $query = "SELECT a.id, a.kdProgram, b.kdPerseorangan, b.nama, a.nmProgram, a.gambar, a.keterangan, a.donasi, a.status, a.idLevel FROM program a, perseorangan b WHERE a.idLembaga=b.id  AND (a.status='T' or a.status='P') AND (a.idLembaga='" . $_SESSION["ses_id"] . "' AND a.idLevel='2') AND a.id='$id'";
  $sql = mysqli_query($con, $query);
  $sql_slice = mysqli_fetch_array($sql, MYSQLI_BOTH);

  return $sql_slice;
}

function SelectDataTransaksiDonasi()
{
  global $con;

  $query = "SELECT a.id, b.kdProgram, b.nmProgram, a.idDonatur, a.nominal, a.status FROM transaksi a, program b, donatur c WHERE a.idProgram=b.id AND a.idDonatur=c.id AND b.idLembaga='" . $_SESSION["ses_id"] . "' AND b.idLevel='2'";
  $sql = mysqli_query($con, $query);

  return $sql;
}

// function ConfirmTransaksiDonasi($id)
// {
//   global $con;

//   $query = "UPDATE transaksi SET status = 'K' where id = '$id'";
//   $sql = mysqli_query($con, $query);

//   if ($sql) {
//     echo "<script>alert('Konfirmasi Berhasil')</script>";
//     echo "<meta http-equiv='refresh' content='0; url=index.php?level=perseorangan&page=transaksi'>";
//   } else {
//     echo "<script>alert('konfirmasi Gagal')</script>";
//     echo "<meta http-equiv='refresh' content='0; url=index.php?level=perseorangan&page=transaksi'>";
//   }
// }

function progPer()
{
  global $con;
  $idUser = $_SESSION["ses_id"];
  $sql = "SELECT a.id, a.kdProgram, b.nama,a.nmProgram, a.keterangan, a.donasi, a.status FROM program a, perseorangan b WHERE a.idLembaga=b.id  AND (a.status='T' or a.status='P') AND (a.idLembaga='$idUser' AND a.idLevel='2')";
  $query = mysqli_query($con, $sql);
  return $query;
}

function archiveOto()
{
  global $con;
  $sql_otoarsip = "UPDATE program SET status='A' WHERE tgl_akhir=curdate()";
  mysqli_query($con, $sql_otoarsip);
}

function SelectDataDana($id)
{
  global $con;

  $query = "SELECT a.id, b.kdProgram, b.nmProgram, b.donasi , SUM(a.nominal) AS Total, b.donasi - SUM(a.nominal) AS Tidak  FROM transaksi a, program b WHERE a.idProgram=b.id AND a.status='K' AND b.idLembaga='$id' AND b.idLevel='1'";
  $sql = mysqli_query($con, $query);

  return $sql;
}

function GetNewestProgram($order)
{
  global $con;

  $query = 'SELECT * FROM `program` ORDER BY `program`.`tgl_masuk` ' . $order;
  $sql = mysqli_query($con, $query);

  return $sql;
}

function GetProgramByJenis($jenis)
{
  global $con;

  // $query = 'SELECT * FROM `program` WHERE `idJenis`='.$jenis.' AND `status`="P" ORDER BY tgl_masuk';
  // $query =  'SELECT a.*, b.nominal, SUM(b.nominal) AS jumlah FROM program a, transaksi b WHERE b.idProgram=a.id AND a.`idJenis`='9' AND a.id='27' AND a.`status`="P" ORDER BY a.tgl_masuk';
 $query =  'SELECT a.*, b.nominal, SUM(b.nominal) AS jumlah FROM program a, transaksi b WHERE b.idProgram=a.id AND a.`idJenis`='.$jenis.' AND a.`status`="P" ORDER BY a.tgl_masuk';
  $sql = mysqli_query($con, $query);

  return $sql;
}


function sendTransaksi()
{
  function ConfirmTransaksiDonasi($id)
    {
      global $con;

      $query = "UPDATE transaksi SET status = 'K' where id = '$id'";
      $sql = mysqli_query($con, $query);

      if ($sql) {
        echo "<script>alert('Konfirmasi Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?level=perseorangan&page=transaksi'>";
      } else {
        echo "<script>alert('konfirmasi Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?level=perseorangan&page=transaksi'>";
      }

      
    }
  
  if(isset($_GET['kode'])){
    global $con;
    $sql_cek = "SELECT a.id AS don, a.nama, a.id_chat, c.nmProgram, b.id FROM donatur a, transaksi b, program c WHERE b.idDonatur=a.id AND b.idProgram=c.id AND b.id='".$_GET['kode']."'";
    $query_cek = mysqli_query($con, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
  }
  define('BOT_TOKEN', '1860399808:AAGIDR6LzARUQn5luzkwu3yonZg5ZOiBXoc');
  define('CHAT_ID',$data_cek['id_chat']);
   
  function kirimTelegram($pesan) {
      $pesan = json_encode($pesan);
      $API = "https://api.telegram.org/bot".BOT_TOKEN."/sendmessage?chat_id=".CHAT_ID."&text=$pesan";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
      curl_setopt($ch, CURLOPT_URL, $API);
      $result = curl_exec($ch);
      curl_close($ch);
      return $result;
  }
   
  kirimTelegram("Transaksi Donasi Anda telah diterima. Terimakasih Atas donasi yang anda berikan");
}

function getProgamByUSERS($param)
{
  global $con;

  switch ($param) {
    case 1:
      $query = "SELECT a.kdProgram as kode, a.nmProgram, a.id, b.nmLembaga as namaAtas, b.no_rek, a.gambar FROM program a, lembaga b WHERE b.id=a.idLembaga AND status='P' ORDER BY `tgl_masuk` DESC";
      break;
    
    case 2:
      $query = "SELECT a.kdProgram as kode, a.nmProgram, a.id, b.nama as namaAtas, b.no_rek, a.gambar FROM program a, perseorangan b WHERE b.id=a.idLembaga AND status='P' ORDER BY `tgl_masuk` DESC";
      break;
  }

  $sql = mysqli_query($con, $query);
  return $sql;
}

function broadcast()
{
  function confirmProg($id)
  {
    global $con;

    $sql_arsip = "UPDATE program SET status = 'P' where id = '$id'";
    $query_arsip = mysqli_query($con, $sql_arsip);

        if ($query_arsip) {
            echo "<script>alert('Konfirmasi Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=progAcc'>";
        }else{
            echo "<script>alert('konfirmasi Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=progAcc'>";
        }
  }
  global $con;
  $sql_no = "SELECT id_chat FROM donatur";
  $query_no = mysqli_query($con, $sql_no);
  $no = 1;
  define('BOT_TOKENS', '1860399808:AAGIDR6LzARUQn5luzkwu3yonZg5ZOiBXoc');
  $id_teles = [];
  foreach($query_no as $item){
  echo $item['id_chat'];
  array_push($id_teles, $item['id_chat']);
  }
  // var_dump($id_teles);
   function kirimTelegrams($pesan, $ar) {
      $pesan = json_encode($pesan);
      $c = [];
      foreach ($ar as $value) {
        $API = "https://api.telegram.org/bot".BOT_TOKENS."/sendmessage?chat_id=".$value."&text=$pesan";
        array_push($c, $API);
      }

      var_dump($c);
      
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
      for ($i=0; $i < count($c) ; $i++) { 
        curl_setopt($ch, CURLOPT_URL, $c[$i]);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
      }
  }
   
  kirimTelegrams("Halo Para Donatur yang terhormat. Peduliku mempunyai program donasi terbaru yang telah dipublish. Semoga ada waktu untuk mengecek donasi, Terimakasih", $id_teles);

}

function coba()
{
  global $con;
  $sql_no = "SELECT id_chat FROM donatur";
  $query_no = mysqli_query($con, $sql_no);
  $no = 1;
  foreach($query_no as $item){
    echo $item['id_chat'];
   }
}
