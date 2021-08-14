<?php
  include_once("../../koneksi.php");

  if(isset($_GET['idKode']) && isset($_GET['jumlahs'])) {
    insertKelolaDana($_GET['idKode'], $_GET['jumlahs']);
    // header('location: ?page=dana');
    echo '<meta http-equiv="refresh" content="0;url=?page=dana">';
  }
?>

Peduli-Ku

    Menu
    Dashboard
    Kelola Data Program
    Transaksi Donasi
    Kelola Dana
    Menu Lain
    Administrasi Donasi
    Logout

string(4) "2020"


Program Terdaftar

Notice: Undefined variable: sql in /opt/lampp/htdocs/KitaBisa-Wannabe/dist/v_admin/rekap/rekap_view.php on line 71

Warning: Invalid argument supplied for foreach() in /opt/lampp/htdocs/KitaBisa-Wannabe/dist/v_admin/rekap/rekap_view.php on line 71
Show
entries
Search:
No	Kode	Nama Program	Tanggal Pengajuan	Aksi
No
	
Kode
	
Nama Program
	
Tanggal Pengajuan
	
Aksi
No data available in table
Showing 0 to 0 of 0 entries

    Previous
    Next