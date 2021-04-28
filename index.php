<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <meta name="Description" content="Enter your description here" />
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <title>Tugas 10</title>
</head>

<body>
     <div class="container p-3">
          <H2 align="center">Aplikasi CRUD</H2>
          <br>

          <form method="post" id="kirim">
               <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="masukkan nama produk">
               </div>
               <br>
               <div class="form-group">
                    <label>Harga</label>
                    <input type="number" class="form-control" name="harga" id="harga" placeholder="masukkan harga produk">
               </div>
               <br>
               <div class="form-group">
                    <label>stock</label>
                    <input type="number" class="form-control" name="stock" id="stock" placeholder="masukkan stock">
               </div>
               <br>
               <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="ket" id="ket" rows="3"></textarea>
               </div>
               <br><br>
               <div align="center">
                    <button class="btn btn-outline-success" style="width: 200px; height: 80px;">Input</button>
               </div>
          </form>
     </div>

     <br><br>

     <div class="container">
          <div class="tampil"></div>
     </div>

     <div class="modal fade" id="modaledit">
          <div class="modal-dialog">
               <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                         <h4 class="modal-title">Update Data</h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                         <form action="do_update.php" id="editbarang" method="post">
                              <div class="form-group">
                                   <label>Nama Barang</label>
                                   <input type="text" class="form-control" name="edit_nama" id="edit_nama" placeholder="masukkan nama produk">
                              </div>
                              <br>
                              <div class="form-group">
                                   <label>Harga</label>
                                   <input type="number" class="form-control" name="edit_harga" id="edit_harga" placeholder="masukkan harga produk">
                              </div>
                              <br>
                              <div class="form-group">
                                   <label>stock</label>
                                   <input type="number" class="form-control" name="edit_stock" id="edit_stock" placeholder="masukkan stock">
                              </div>
                              <br>
                              <div class="form-group">
                                   <label>Keterangan</label>
                                   <textarea class="form-control" name="edit_ket" id="edit_ket" rows="3"></textarea>
                              </div>
                              <input type="hidden" name="kd_produk" id="kd_produk">
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                         <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Ya</button>
                         </form>
                         <button class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-close"></i> Tidak</button>
                    </div>
               </div>

          </div>
     </div>


     <div class="modal fade" id="modalhapus">
          <div class="modal-dialog">
               <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                         <h4 class="modal-title">Konfirmasi</h4>
                    </div>

                    <form action="do_hapus.php" id="hapusbrg" method="post">
                         <!-- Modal body -->
                         <div class="modal-body">
                              Apakah Anda yakin mau menghapus?
                         </div>

                         <!-- Modal footer -->
                         <div class="modal-footer">
                              <button class="btn btn-success" id="hapusbrg" type="submit"><i class="fa fa-check"></i> Ya</button>
                    </form>
                    <button class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-close"></i> Tidak</button>
               </div>
          </div>
     </div>
     </div>

     <script>
          $(document).ready(function() {
               let nama, harga, stock, ket, kd_produk;

               $("#nama").keyup(function() {
                    nama = $(this).val();
               });

               $("#harga").keyup(function() {
                    harga = $(this).val();
               });

               $("#stock").keyup(function() {
                    stock = $(this).val();
               });

               $("#ket").keyup(function() {
                    ket = $(this).val();
               });

               $("#kirim").submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                         type: "POST",
                         data: {
                              nama: nama,
                              harga: harga,
                              stock: stock,
                              ket: ket
                         },
                         url: "do_input.php",
                         success: function(data) {
                              if (data == 1) {
                                   alert("data berhasil diinput!");
                                   update();
                              } else {
                                   alert("data gagal diinput! silahkan coba lagi!");
                                   console.log(data);
                              }
                         }
                    });
               });

               update();

               function update() {
                    $(".tampil").load("do_tampildata.php");
               };

               $(document).on("click", "a[data-role='hapus']", function() {
                    $('#modalhapus').modal('toggle');
                    kd_produk = $(this).data("id");
                    // console.log(kd_produk);
               });

               $("#hapusbrg").on("click", function(e) {
                    e.preventDefault();
                    $.ajax({
                         url: "do_hapus.php",
                         type: 'post',
                         data: {
                              id: kd_produk
                         },
                         success: function(data) {
                              if(data == 1)
                              {
                                   alert("Data berhasil di hapus!");
                                   $('#modalhapus').modal('toggle');
                                   update();
                              }
                              else
                              {
                                   alert("Data gagal di hapus! Silahkan coba lagi!");
                              }
                         },
                    });
               });

               $(document).on("click", "a[data-role='edit']", function() {
                    var id = $(this).data('id');
                    var nama = $("#" + id).children("td[data-target=nama]").text();
                    var harga = $("#" + id).children("td[data-target=harga]").text();
                    var jumlah = $("#" + id).children("td[data-target=jumlah]").text();
                    var ket = $("#" + id).children("td[data-target=ket]").text();

                    $("#edit_nama").val(nama);
                    $("#edit_harga").val(harga);
                    $("#edit_stock").val(jumlah);
                    $("#edit_ket").val(ket);
                    $("#kd_produk").val(id);
                    $('#modaledit').modal('toggle');
               });

               $("#editbarang").on("submit", function(e) {
                    var id = $("#kd_produk").val();
                    var nama = $("#edit_nama").val();
                    var harga = $("#edit_harga").val();
                    var jumlah = $("#edit_stock").val();
                    var ket = $("#edit_ket").val();

                    e.preventDefault();

                    $.ajax({
                         url: "do_update.php",
                         data: $(this).serialize(),
                         type: 'post',
                         success: function(data) {
                              if (data == 1) {
                                   alert("Data berhasil di update!");
                                   $("#" + id).children("td[data-target=nama]").text(nama);
                                   $("#" + id).children("td[data-target=harga]").text(harga);
                                   $("#" + id).children("td[data-target=jumlah]").text(jumlah);
                                   $("#" + id).children("td[data-target=ket]").text(ket);

                                   $('#modaledit').modal('toggle');
                              } else {
                                   alert("Data gagal di update! Silahkan coba lagi!");
                              }
                         },
                    });
               });
          });
     </script>
</body>

</html>