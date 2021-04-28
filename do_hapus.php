<?php
     include "koneksi.php";

     $id = $_POST['id'];

     $sql = mysqli_query($conn, "delete from produk where kd_produk = '$id' ");

     if($cek = mysqli_affected_rows($conn) > 0)
     {
          echo $cek;
     }
     else
     {
          echo $cek;
     }
?>