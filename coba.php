<?php
include_once("koneksi.php");
  $sql_no = "SELECT id_chat FROM donatur";
  $query_no = mysqli_query($con, $sql_no);
  $no = 1;
  foreach($query_no as $item){
    echo $item['id_chat'];
    echo '<br>';
    
   }
   ?>