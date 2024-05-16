 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
         </div>
         <div class=" card-header  ">
             
             <a href="index.php?halaman=tambahproduk" class="btn-primary btn">Tambah Produk</a>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Kategori</th>
                             <th>Nama</th>
                             <th>Harga</th>
                             <th>Berat</th>
                             <th>Deskripsi</th>
                             <th>Stok</th>
                             <th>Foto</th>
                             <th>Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $nomor = 1; ?>
                         <?php $ambil = $koneksi->query("SELECT * FROM t_produk LEFT JOIN t_kategori ON t_produk.id_kategori=t_kategori.id_kategori "); ?>
                         <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                             <tr>
                                 <td><?php echo $nomor; ?></td>
                                 <td><?php echo $pecah['nama_kategori']; ?></td>
                                 <td><?php echo $pecah['nama_produk']; ?></td>
                                 <td><?php echo $pecah['harga_produk']; ?></td>
                                 <td><?php echo $pecah['berat_produk']; ?></td>
                                 <td><?php echo $pecah['deskripsi_produk']; ?></td>
                                 <td><?php echo $pecah['stok_produk']; ?></td>

                                 <td>
                                     <img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" widht="50" style="width: 10rem;">
                                 </td>

                                 <td>
                                     <a href="index.php?halaman=hapusproduk&id= <?php echo $pecah['id_produk']; ?>" class="btn-danger btn">Hapus</a>
                                     <a href="index.php?halaman=ubahproduk&id= <?php echo $pecah['id_produk']; ?>" class="btn-warning btn">Edit</a>
                                 </td>
                             </tr>
                             <?php $nomor++; ?>
                         <?php } ?>

                     </tbody>
                 </table>

             </div>
         </div>
     </div>
 </div>
 <br> <br> <br> <br> <br><br> <br> <br> <br> <br>