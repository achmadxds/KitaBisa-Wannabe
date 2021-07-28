<?php

 //Mendefinisikan Konstanta

 define('HOST','localhost');
 define('USER','root');
 define('PASS','');
 define('DB','sosial');

//  define('HOST','localhost');
//  define('USER','201653054');
//  define('PASS','@Ansya201653054_+');
//  define('DB','db_201653054');
 
 
 //membuat koneksi dengan database
 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
 
 ?>