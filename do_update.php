<?php
     include "koneksi.php";

     $nama = $_POST['edit_nama'];
     $stock = $_POST['edit_stock'];
     $ket = $_POST['edit_ket'];
     $harga = $_POST['edit_harga'];
     $kd_produk = $_POST['kd_produk'];

     $query = "update produk set nama_produk = '$nama', jumlah = '$stock', keterangan = '$ket', harga = '$harga' where kd_produk = '$kd_produk' ";
     $sql = mysqli_query($conn, $query);

     if($cek = mysqli_affected_rows($conn) > 0)
     {
          echo $cek;
     }
     else
     {
          echo $cek;
          // echo "<br> $query";
     }
?>