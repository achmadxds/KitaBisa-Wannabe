<?php
include_once("__DIR__ .  ../../../../koneksi.php");

if (isset($_POST['btnSimpan'])) {
	InsertToProgram(Upload_Files('txtfotoProgram', 'txtKdProgram'));
} elseif (isset($_POST['btnUBAH'])) {
  UpdateToProgram();
} else {
	if (isset($_GET['kode'])) {
    DeleteProgram($_GET['kode']);
	}
}
