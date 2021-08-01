<?php

 //Mendefinisikan Konstanta

 define('HOST','localhost');
 define('USER','root');
 define('PASS','');
 define('DB','sosialrev');
//  define('DB','sosial');

 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
 
 ?>