<?php
     include "koneksi.php";

     $nama = $_POST['nama'];
     $ket = $_POST['ket'];
     $stock = $_POST['stock'];
     $harga = $_POST['harga'];

     $query = "select max(kd_produk) as maxkode from produk";
     $hasil = mysqli_query($conn, $query);
     $data = mysqli_fetch_array($hasil);
     $kode = $data['maxkode'];
     $ubah = (int) substr($kode, 4, 3);
     $ubah++;
     $kd_produk = "PRK-" . sprintf("%03s", $ubah);

     $query1 = "insert into produk (keterangan, jumlah, harga, nama_produk, kd_produk) values ('$ket', '$stock', '$harga', '$nama', '$kd_produk')";
     $sql = mysqli_query($conn, $query1);

     if(mysqli_affected_rows($conn) >= 0)
     {
          echo "1";
     }
     else
     {
          echo "0";
     }
