<table class="table table-striped table-hover table-bordered m-2">
     <tr>
          <th>Nama Produk</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Keterangan</th>
          <th colspan="2">Action</th>
     </tr>
     <?php
     include "koneksi.php";

     $sql = mysqli_query($conn, "SELECT * FROM produk");

     while ($data = mysqli_fetch_array($sql)) {
          $edit = '<a class="btn btn-outline-info" data-role="edit" data-id="' . $data['kd_produk'] . '">Edit</a>';
          $hapus = '<a class="btn btn-outline-danger" data-role="hapus" data-id="' . $data['kd_produk'] . '">Hapus</a>';
     ?>
          <tr id="<?php echo $data['kd_produk']; ?>">
               <td data-target="nama"><?php echo $data['nama_produk']; ?></td>
               <td data-target="harga"><?php echo $data['harga']; ?></td>
               <td data-target="jumlah"><?php echo $data['jumlah']; ?></td>
               <td data-target="ket"><?php echo $data['keterangan']; ?></td>
               <td><?php echo $edit; ?></td>
               <td><?php echo $hapus; ?></td>
          </tr>

     <?php
     }
     ?>